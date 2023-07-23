<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Models\PoliceStation;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class PoliceStationController extends Controller
{
    public function index()
    {
        $policeStations = PoliceStation::orderBy('location_id', 'asc')->get();
        return view('backend.police-stations.index', compact('policeStations'));
    }
    public function create()
    {
        $location = Location::all();
        return view('backend.police-stations.create', compact('location'));
    }
    public function store(Request $request)
    {
        try {
            $numbers = explode(',', $request->station_number);
            $policeStation = new PoliceStation();
            $policeStation->location_id    = $request->location_id ?? null;
            $policeStation->name           = $request->name ?? null;
            $policeStation->station_number = json_encode($numbers) ?? null;
            $policeStation->station_tel    = $request->station_tel ?? null;
            $policeStation->description    = $request->description ?? null;
            $policeStation->save();
            
            return redirect()->route('police-stations.index')->with('alert', 'Saved Successfully');
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
        $data = PoliceStation::where('id', $id)->first();
        return view('backend.police-stations.show', compact('data'));
    }
    public function edit($id)
    {
        $location = Location::all();
        $data = PoliceStation::where('id', $id)->first();
        return view('backend.police-stations.edit', compact('data', 'location'));
    }
    public function update(Request $request, $id)
    {
        try {
            $numbers = explode(',', $request->station_number);
            $policeStation = PoliceStation::where('id', $id)->first();
            $policeStation->location_id    = $request->location_id ?? null;
            $policeStation->name           = $request->name ?? null;
            $policeStation->station_number = json_encode($numbers) ?? null;
            $policeStation->station_tel    = $request->station_tel ?? null;
            $policeStation->description    = $request->description ?? null;
            $policeStation->save();

            return redirect()->route('police-stations.index')->with('alert', 'Updated Successfully');
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
            $data = PoliceStation::where('id', $id)->first();
            $data->delete();
            return redirect()->route('police-stations.index')->with('alert', 'Deleted Successfully');
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
    public function getPoliceStationService(Request $request)
    {
        try {
            $selectedLocation = $request->location_id ?? null;
            if (isset($request->location_id)) {

                $policeStations = PoliceStation::where('location_id', $request->location_id)->get();
                
            } else {
                $policeStations = PoliceStation::all();
            }
            $locations = Location::orderBy('division', 'asc')->get();
            
            $policeLocations = PoliceStation::pluck('location_id')->toArray();
            $categories = Location::whereIn('id', $policeLocations)->orderBy('division')->get()->groupBy('division');
            
            return view('frontend.services.police-station', compact('policeStations', 'locations', 'selectedLocation', 'categories'));
            
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
        $policeStations = PoliceStation::whereIn('location_id', $locationIds)->get();
        $locations = Location::orderBy('division', 'asc')->get();
        $policeLocationIds = PoliceStation::pluck('location_id')->toArray();
        $categories = Location::whereIn('id', $policeLocationIds)->orderBy('division')->get()->groupBy('division');
        return view('frontend.services.police-station', compact('policeStations', 'categories', 'locations'));
    }


    /**
     * API Routes For Locations
     */
    public function getDistrict(Request $request)
    {
        $districts = Location::where("division",$request->division)->pluck("district","id");

        return response()->json($districts);
    }

    public function getArea(Request $request)
    {
        $areas = Location::where("district",$request->district)->pluck("area","id");

        return response()->json($areas);
    }
}
