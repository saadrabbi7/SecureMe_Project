<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Profile;
use App\Models\Location;
use App\Models\BloodBank;
use App\Models\PictureRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Database\QueryException;
class ProfileController extends Controller
{
    public function userList()
    {
        $users = User::all();
        return view('backend.users.index', compact('users'));
    }
    public function userRemove($id)
    {
        $user = User::where('id', $id)->first();
        if (isset($user->profile)) {
            $this->unlink($user->profile->picture);
            $user->profile->delete();
        }
        $user->delete();
        return redirect()->route('users')->withSuccess('Users Succussfully Deleted');
    }
    public function userEdit($id)
    {
        $user = User::where('id', $id)->first();
        $bloodGroups = BloodBank::bloodGroups();
        return view('backend.users.edit', compact('user', 'bloodGroups'));
    }
    public function userUpdate(Request $request, $id)
    {
        try {
            User::where('id', $id)->update([
                'name'        => $request->name,
                'phone'       => $request->phone,
                'email'       => $request->email,
                'blood_group' => $request->blood_group,
                'is_admin'    => $request->is_admin,
            ]);

            return redirect()->route('users')->withSuccess('Users Succussfully Updated');
        } catch (\Exception $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
    }
    public function profile()
    {
        $user        = auth()->user();
        $bloodGroups = BloodBank::bloodGroups();
        $location    = Location::all();
        $data        = User::where('id', $user->id)->first();
        $profileData        = Profile::where('user_id', $user->id)->first();
        $recordPictures = PictureRecord::where('user_id', $user->id)->get();
        return view('auth.profile', compact('data', 'bloodGroups', 'location', 'profileData', 'recordPictures'));
    }
    public function updateProfile(Request $request)
    {
        try {
            $profile = Profile::where('user_id', $request->user_id)->first();
            User::where('id', $request->user_id)->update([
                "name"        => $request->name ?? null,
                "email"       => $request->email ?? null,
                "phone"       => $request->phone ?? null,
                "blood_group" => $request->blood_group ?? null,
            ]);
            if ($request->location_id != null) {
                $location = Location::where('id', $request->location_id)->first();
            }
            if($profile != null) {
                if ($request->hasFile('picture')) {
                    $this->unlink($profile->picture);
                    $picture    = $this->uploadFile($request->picture, $request->name);
                    $profile->picture     = $picture ?? null;
                }
                $profile->user_id     = $request->user_id ?? null;
                $profile->f_name      = $request->f_name ?? null;
                $profile->m_name      = $request->m_name ?? null;
                $profile->f_mobile_no = $request->f_mobile_no ?? null;
                $profile->m_mobile_no = $request->m_mobile_no ?? null;
                $profile->location_id = $request->location_id ?? null;
                $profile->division    = isset($location) ? $location->division : null;
                $profile->district    = isset($location) ? $location->district : null;
                $profile->area        = isset($location) ? $location->area : null;
                $profile->police_station_id = $request->police_station_id ?? null;
                $profile->save();
            } else {
                Profile::create([
                    "user_id"     => $request->user_id ?? null,
                    "f_name"      => $request->f_name ?? null,
                    "m_name"      => $request->m_name ?? null,
                    "f_mobile_no" => $request->f_mobile_no ?? null,
                    "m_mobile_no" => $request->m_mobile_no ?? null,
                    "location_id" => $request->location_id ?? null,
                    "division"    => isset($location) ? $location->division : null,
                    "district"    => isset($location) ? $location->district : null,
                    "area"        => isset($location) ? $location->area : null,
                    "picture"     => ($request->hasFile('picture')) ? ($this->uploadFile($request->picture, $request->name)) : null,
                    "police_station_id" => $request->police_station_id ?? null,
                ]);
            }
            $this->updateBloodGroup($request->user_id);

            return redirect()->back()->with("alert", "Profile Successfully Updated");
        } 
        catch (Exception $th) {
            return redirect()->back()->with("alert", $th->getMessage());
        }
        catch (QueryException $th) {
            return redirect()->back()->with("alert", $th->getMessage());
        }
    }
    private function updateBloodGroup($user_id)
    {
        $profile = Profile::where('user_id', $user_id)->first();
        if ($profile != null && (isset($profile->location_id) && $profile->location_id != null)) {
            BloodBank::where('phone_number', $profile->user->phone)->update([
                'location_id' => $profile->location_id ?? null
            ]);
        }
    }

    private function uploadFile($file, $name)
    {
        $folder = public_path('profile-images/');
        if (!File::exists($folder)) {
            $folderCreate = File::makeDirectory($folder, 0775, true, true);  
            if (!isset($folderCreate))
                throw new Exception("Could not permission for creating folder on storage path.", 1);
        }
        $timestamp = str_replace([' ', ':'], '', now());
        $file_name = $timestamp .'-'.$name. '.' .$file->getClientOriginalExtension();
        $file->move($folder, $file_name);
 
        return $file_name;
    }
 
    private function unlink($file)
    {
        $pathToUpload = public_path('profile-images/');
        if ($file != '' && file_exists($pathToUpload. $file)) {
            @unlink($pathToUpload. $file);
        }
    }

}
