<?php

namespace App\Models;

use App\Models\User;
use App\Models\PoliceStation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;
    protected $table = "profiles";
    protected $guarded = [];
    /**
     * ===========================
     *      Relations
     * ===========================
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function policestation()
    {
        return $this->hasOne(PoliceStation::class, 'location_id', 'location_id');
    }
    public static function sendSMS($mobile_no, $message)
    {
        try {            
            
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "http://sms3.pondit.com:7788/sendtext?apikey=d72012d5a83441db&secretkey=57b95570&callerID=12345&toUser=".$mobile_no."&messageContent=".urlencode ($message),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
            ));
            $response = curl_exec($curl);
            $err = curl_error($curl);
        
            curl_close($curl);
        
            if ($err) {
                //echo "cURL Error #:" . $err;
                return false;
            } else {
                //echo $response;
                return true;
            }
           

        } catch (Exception $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }

    }
}
