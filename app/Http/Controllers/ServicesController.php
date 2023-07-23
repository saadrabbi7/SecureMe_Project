<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;

class ServicesController extends Controller
{
    public function getGeoLocation(Request $request)
    {
        $userIpAddress = $request->ip();
    // $userIpAddress = "220.247.131.17";
        if (isset($userIpAddress)) {
            $locationData = Location::get($userIpAddress );
        }
        // dd($locationData);
        return view('frontend.services.location', compact('locationData'));
    }
}
