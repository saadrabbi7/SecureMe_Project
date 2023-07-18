<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\AmbulanceController;
use App\Http\Controllers\BloodBankController;
use App\Http\Controllers\PoliceStationController;
use App\Models\BloodBank;
use App\Models\Contact;

/* 
/ ------------------------------------------------------------------------
/ Frontend Web Routes Start
/ ------------------------------------------------------------------------
*/

Route::get('/', function () {
    $totalMembers = User::count();
    $donars = BloodBank::count();
    $contacts = Contact::count();
    return view('frontend', compact('totalMembers', 'donars', 'contacts'));
});
Route::get('/contact-us', function () {
    return view('frontend.contact-us');
});

Route::post('sendmail', [ContactController::class, 'sendMail'])->name('sendMail');
Route::get('/contacts', [ContactController::class, 'index'])->name('contact.index');
Route::post('/store', [ContactController::class, 'store'])->name('contact.store');
Route::post('/delete/{id}', [ContactController::class, 'destroy'])->name('contact.delete');


Route::get('/law', function () {
    return view('frontend.law');
});
Route::prefix('services')->group(function () {

    Route::get('/police-stations', [PoliceStationController::class, 'getPoliceStationService']);
    Route::get('/police-stations/{division}', [PoliceStationController::class, 'divisionCategory']);
    Route::get('/get-district', [PoliceStationController::class, 'getDistrict']);
    Route::get('/get-area', [PoliceStationController::class, 'getArea']);
    
    Route::get('/ambulances', [AmbulanceController::class, 'getAmbulanceService']);
    Route::get('/ambulances/{division}', [AmbulanceController::class, 'divisionCategory']);
    Route::get('/blood-bank', [BloodBankController::class, 'getBloodBankService']);
    Route::get('/blood-banks/{division}', [BloodBankController::class, 'divisionCategory']);

    Route::get('/location', [ServicesController::class, 'getGeoLocation']);

    Route::get('/picture-records', function () {
        return view('frontend.services.picture-record');
    });

});