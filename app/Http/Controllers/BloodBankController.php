<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Location;
use App\Models\BloodBank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class BloodBankController extends Controller
{
    public function index()
    {
        $bloodBanks = BloodBank::orderBy('location_id', 'asc')->get();
        return view('backend.blood-banks.index', compact('bloodBanks'));
    }
    public function create()
    {
        $location    = Location::all();
        $bloodGroups = BloodBank::bloodGroups();
        return view('backend.blood-banks.create', compact('location', 'bloodGroups'));
    }
    public function store(Request $request)
    {
        try {
            BloodBank::create($request->all());
            
            return redirect()->route('blood-banks.index')->with('alert', 'Saved Successfully');
        } 
        catch (Exception $th) {
            return redirect()->back()->with('alert', $th->getMessage());
        }
        catch (QueryException $th) {
            return redirect()->back()->with('alert', $th->getMessage());
        }
    }
    public function show($id)
    {
        $data = BloodBank::where('id', $id)->first();
        return view('backend.blood-banks.show', compact('data'));
    }
    public function edit($id)
    {
        $location    = Location::all();
        $bloodGroups = BloodBank::bloodGroups();
        $data        = BloodBank::where('id', $id)->first();
        return view('backend.blood-banks.edit', compact('data', 'location', 'bloodGroups'));
    }
    public function update(Request $request, $id)
    {
        try {
            $bloodBank = BloodBank::where('id', $id)->first();
            $bloodBank->update($request->all());

            return redirect()->route('blood-banks.index')->with('alert', 'Updated Successfully');
        } 
        catch (Exception $th) {
            return redirect()->back()->with('alert', $th->getMessage());
        }
        catch (QueryException $th) {
            return redirect()->back()->with('alert', $th->getMessage());
        }
    }
    public function destroy($id)
    {
        try {
            $data = BloodBank::where('id', $id)->first();
            $data->delete();
            return redirect()->route('blood-banks.index')->with('alert', 'Deleted Successfully');
        } 
        catch (Exception $th) {
            return redirect()->back()->with('alert', $th->getMessage());
        }
        catch (QueryException $th) {
            return redirect()->back()->with('alert', $th->getMessage());
        }
    }
    /**
     * FRONTEND INTEGRATION
     */
    public function getBloodBankService(Request $request)
    {
        try {
            $selectedBloodGroup = $request->blood_group ?? null;
            if (isset($request->blood_group)) {
                $bloodBanks = BloodBank::where('blood_group', $request->blood_group)->get();
                
            } else {
                $bloodBanks = BloodBank::all();                
            }
            $bloodGroups = BloodBank::bloodGroups();

            $bloodBankLocations = BloodBank::pluck('location_id')->toArray();
            $categories = Location::whereIn('id', $bloodBankLocations)->orderBy('division')->get()->groupBy('division');

            return view('frontend.services.blood-bank', compact('bloodBanks', 'bloodGroups', 'selectedBloodGroup', 'categories'));
            
        } 
        catch (Exception $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
        catch (QueryException $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
    }
    public function divisionCategory($division)
    {
        $locationIds = Location::where(DB::raw(trim('lower(division)', ' ')), 'like', '%' . strtolower($division) . '%')->pluck('id')->toArray();
        $bloodBanks  = BloodBank::whereIn('location_id', $locationIds)->get();
        $bloodGroups = BloodBank::bloodGroups();

        $bloodBankLocaionIds = BloodBank::pluck('location_id')->toArray();
        $categories          = Location::whereIn('id', $bloodBankLocaionIds)->orderBy('division')->get()->groupBy('division');

        return view('frontend.services.blood-bank', compact('bloodBanks', 'categories', 'bloodGroups'));
    }
}
