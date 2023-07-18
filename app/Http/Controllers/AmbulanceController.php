<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Location;
use App\Models\Ambulance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class AmbulanceController extends Controller
{
    public function index()
    {
        $ambulances = Ambulance::orderBy('location_id', 'asc')->get();
        return view('backend.ambulances.index', compact('ambulances'));
    }
    public function create()
    {
        $types = Ambulance::ambulanceType();
        $location = Location::all();
        return view('backend.ambulances.create', compact('location', 'types'));
    }
    public function store(Request $request)
    {
        try {
            Ambulance::create($request->all());
            
            return redirect()->route('ambulances.index')->with('alert', 'Saved Successfully');
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
        $data = Ambulance::where('id', $id)->first();
        return view('backend.ambulances.show', compact('data'));
    }
    public function edit($id)
    {
        $location = Location::all();
        $types = Ambulance::ambulanceType();
        $data = Ambulance::where('id', $id)->first();
        return view('backend.ambulances.edit', compact('data', 'location', 'types'));
    }
    public function update(Request $request, $id)
    {
        try {
            $ambulance = Ambulance::where('id', $id)->first();
            $ambulance->update($request->all());

            return redirect()->route('ambulances.index')->with('alert', 'Updated Successfully');
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
            $data = Ambulance::where('id', $id)->first();
            $data->delete();
            return redirect()->route('ambulances.index')->with('alert', 'Deleted Successfully');
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
    public function getAmbulanceService(Request $request)
    {
        try {
            $selectedLocation = $request->location_id ?? null;

            if (isset($request->location_id)) {
                $ambulances = Ambulance::where('location_id', $request->location_id)->get();
            } else {
                $ambulances = Ambulance::all();
            }
            $locations = Location::orderBy('division', 'asc')->get();

            $ambulanceLocationIds = Ambulance::pluck('location_id')->toArray();
            $categories = Location::whereIn('id', $ambulanceLocationIds)->orderBy('division')->get()->groupBy('division');

            return view('frontend.services.ambulance', compact('ambulances', 'locations', 'selectedLocation', 'categories'));
            
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
        $ambulances = Ambulance::whereIn('location_id', $locationIds)->get();
        $locations = Location::orderBy('division', 'asc')->get();
        $ambulanceIds = Ambulance::pluck('location_id')->toArray();
        $categories = Location::whereIn('id', $ambulanceIds)->orderBy('division')->get()->groupBy('division');
        return view('frontend.services.ambulance', compact('ambulances', 'categories', 'locations'));
    }

}