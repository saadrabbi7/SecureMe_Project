<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Location as ModelsLocation;
use Stevebauman\Location\Facades\Location;

class EmergencyController extends Controller
{
    public function sendAlert(Request $request)
    {
        $phone = $request->relative_phone ?? null;

        $message = 'I am in Danger. My Location here :   https://' . $request->url . '';

        if (isset($phone)) {
            Profile::sendSMS($phone, $message);
            return redirect()->back()->withSuccess('Send Successfully');
        } else {
            return redirect()->back()->withSuccess('Phone Number Not Found');
        }
    }
}