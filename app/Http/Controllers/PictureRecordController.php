<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PictureRecord;
use Illuminate\Support\Facades\Storage;

class PictureRecordController extends Controller
{
    public function index()
    {
        $data = PictureRecord::orderBy('created_at', 'desc')->get();
        return view('backend.record-pictures.index', compact('data'));
    }
    public function store(Request $request)
    {
        try {

            $img =  $request->get('image');
            $folderPath = public_path('record-pictures/');
            $image_parts = explode(";base64,", $img);

            foreach ($image_parts as $key => $image){
                $image_base64 = base64_decode($image);
            }

            $fileName = uniqid() . '.png';
            $file = $folderPath . $fileName;
            file_put_contents($file, $image_base64);

            PictureRecord::create([
                'user_id' => isset(auth()->user()->id) ? auth()->user()->id : "",
                'user_name' => isset(auth()->user()->name) ? auth()->user()->name : "",
                'image' => $fileName,
                'created_at' => \Carbon\Carbon::now()
            ]);
            
            return response()->json([
                'status' => 'ok'
            ]);

        } catch (Exception $th) {
            return redirect()->back()->withErrors($th->getMessage());
            dd($th->getMessage());
        }
    }
    public function destroy($id)
    {
        $data = PictureRecord::where('id', $id)->first();
        $data->delete();
        return redirect()->back()->withSuccess('Deleted Successfull');
    }
}
