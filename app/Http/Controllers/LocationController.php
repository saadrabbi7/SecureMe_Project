<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::orderBy('division', 'asc')->get();
        return view('backend.locations.index', compact('locations'));
    }
    public function create()
    {
        return view('backend.locations.create');
    }
    public function store(Request $request)
    {
        try {
            Location::create($request->all());
            return redirect()->route('locations.index')->withSuccess('Saved Successfully');
        } 
        catch (Exception $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
        catch (QueryException $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
    }
    public function show($id)
    {
        $data = Location::where('id', $id)->first();
        return view('backend.locations.show', compact('data'));
    }
    public function edit($id)
    {
        $data = Location::where('id', $id)->first();
        return view('backend.locations.edit', compact('data'));
    }
    public function update(Request $request, $id)
    {
        try {
            $data = Location::where('id', $id)->first();
            $data->update($request->all());
            return redirect()->route('locations.index')->withSuccess('Saved Successfully');
        } 
        catch (Exception $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
        catch (QueryException $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
    }
    public function destroy($id)
    {
        try {
            $data = Location::where('id', $id)->first();
            $data->delete();
            return redirect()->route('locations.index')->withMessage('Saved Successfully');
        } 
        catch (Exception $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
        catch (QueryException $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
    }

    public function shareLocation($latitude, $longitude, $accuracy)
    {
        // 23.832489
        // 90.43095
        return view('frontend.services.share-location', compact('latitude', 'longitude', 'accuracy'));
    }










    public function getGeoLocation(Request $request)
    {
        $userIpAddress = $request->ip();
        $locationData = \Location::get($userIpAddress );
        dd($locationData);
        return view('frontend.services.location');
    }
}
