<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Location as ModelsLocation;
use Stevebauman\Location\Facades\Location;

class EmergencyController extends Controller
{
    public function sendAlert(Request $request)
    {
        try {
            // $ip = $request->ip();
            // $ip = '103.121.10.163'; /* Static IP address */
            // $getLocation = Location::get($ip);
            // dd($getLocation);
            // $loca = ModelsLocation::where('upazila', $getLocation->cityName)->first();
            $url = $request->url;

            
            $msg = 'I am in Danger. My Location here :   https://'.$request->url.'';
            
            
            $url = "http://portal.greenheritageit.com/smsapimany";
            $data = [
                "api_key" => "C200118761acdd771860b0.39556660",
                "senderid" => "8809612441553",
                "messages" => json_encode( [
                    [
                        "to" => $request->relative_phone ?? null,
                        "message" => $msg
                    ],
                    [
                        // "to" => "8801748173322",
                        "to" => isset($request->police_station) ? $request->police_station : "",
                        "message" => $msg
                    ]
                ])
            ];
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $response = curl_exec($ch);
            curl_close($ch);

            return redirect()->back()->withSuccess('Send Successfully');


        } catch (Exception $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
    }
}
