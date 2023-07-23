<?php

use App\Models\User;
use App\Models\Contact;
use App\Models\BloodBank;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\AmbulanceController;
use App\Http\Controllers\BloodBankController;
use App\Http\Controllers\EmergencyController;
use App\Http\Controllers\PictureRecordController;
use App\Http\Controllers\PoliceStationController;
use App\Models\Ambulance;

include('frontend.php');
/* 
/ ------------------------------------------------------------------------
/ Frontend Web Routes End
/ ------------------------------------------------------------------------
*/
Auth::routes(); //[Comments] laravel ui authenticate login routes

Route::middleware(['auth'])->group(function () {
    
    Route::get('/users', [ProfileController::class, 'userList'])->name('users');
    Route::get('/users/edit/{id}', [ProfileController::class, 'userEdit'])->name('user.edit');
    Route::get('profile', [ProfileController::class, 'profile'])->name('profile');
    Route::post('/users/update/{id}', [ProfileController::class, 'userUpdate'])->name('user.update');
    Route::post('update-profile', [ProfileController::class, 'updateProfile'])->name('update-profile');
    Route::post('/destroy/{id}', [ProfileController::class, 'userRemove'])->name('user.destroy');

    /* 
    / ------------------------------------------------------------------------
    / Backend Web Routes Start
    / ------------------------------------------------------------------------
    */

    Route::get('/dashboard', function () {
        $totalMembers = User::count();
        $donars   = BloodBank::count();
        $contacts = Contact::count();
        $ambulances = Ambulance::count();
        return view('backend.dashboard', compact('totalMembers', 'donars', 'contacts', 'ambulances'));
    });

    Route::get('/index', function () {
        return view('backend.application.index');
    });

    Route::resource('locations', LocationController::class);
    Route::resource('police-stations', PoliceStationController::class);
    Route::resource('ambulances', AmbulanceController::class);
    Route::resource('blood-banks', BloodBankController::class);
    
});

Route::post('/emergency-alerts', [EmergencyController::class, 'sendAlert'])->name('emergency-alert');
Route::resource('picture-records', PictureRecordController::class)->except([
    'create', 'show', 'edit', 'update'
]);;

Route::get('locations/{latitude}/{longitude}/{accuracy}', [LocationController::class, 'shareLocation'])->name('share-location');

Route::get('/send-sms', function () {
  
        $sid = "AC1532d12dedb3bb7ec4875aecd73977d6"; // Your Account SID from www.twilio.com/console
        $token = "7331206ec49b58678eba7d77f3f59b97"; // Your Auth Token from www.twilio.com/console

        $client = new Twilio\Rest\Client($sid, $token);
        $message = $client->messages->create(
        '+8801811925439', // Text this number
        [
            'from' => '+18704744277', // From a valid Twilio number
            'body' => 'Hello from Twilio! Prabir'
        ]
        );

    echo  $message->sid;
});





/* 
/ ------------------------------------------------------------------------
/ Backend Web Routes End
/ ------------------------------------------------------------------------
*/



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
