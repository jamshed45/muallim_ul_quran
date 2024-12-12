<?php

// use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
// use App\Http\Controllers\getPatientController;
// use App\Http\Controllers\getAppointmentController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\Auth\LoginController;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post('/leadflo-logout', function (Illuminate\Http\Request $request) {
    // Log the user out of the application
    Auth::logout();

    // Invalidate the session
    $request->session()->invalidate();

    // Regenerate the session token
    $request->session()->regenerateToken();

    // Redirect to the login page after logout
    return redirect('/login')->with('status', 'You have been logged out!');
})->name('leadflo-logout');


Route::get('/login', function () {
    return view('auth.login', ['client' => null]);
})->name('login');

// Client-specific login route (only for client role)
Route::get('/login/{client}', function ($client) {
    return view('auth.login', ['client' => $client]);
})->name('client.login');

Route::get('/login/{client}', function ($client) {
    $user = DB::table('users')->where('unique_login_url_name', $client)->first();

    if (!$user) {
        abort(404, 'Client not found');
    }

    return view('auth.login', ['user' => $user]);
})->name('client.login');


Route::get('verify', [LoginController::class, 'showVerificationForm'])->name('verify.show');
Route::post('verify', [LoginController::class, 'verify'])->name('verify');

// Route::middleware('auth', 'two_factor_auth')->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');


Auth::routes();


Route::group(['middleware' => 'auth'], function () {

    Route::resource('/dashboard', DashboardController::class);
    Route::resource('/users', UserController::class);

//    // user permission
//    Route::get('/users', [UserController::class, 'index'])
//    ->name('users.index')
//    ->middleware('permission:Users Management');

// Route::get('/users/create', [UserController::class, 'create'])
//    ->name('users.create')
//    ->middleware('permission:Users Management Add');
// Route::post('/users', [UserController::class, 'store'])
//    ->name('users.store')
//    ->middleware('permission:Users Management Add');

// Route::get('/users/{user}/edit', [UserController::class, 'edit'])
//    ->name('users.edit')
//    ->middleware('permission:Users Management Edit');
// Route::put('/users/{user}', [UserController::class, 'update'])
//    ->name('users.update')
//    ->middleware('permission:Users Management Edit');

// Route::get('/users/{user}', [UserController::class, 'show'])
//    ->name('users.show')
//    ->middleware('permission:Users Management Delete');

// Route::delete('/users/{user}', [UserController::class, 'destroy'])
//    ->name('users.destroy')
//    ->middleware('permission:Users Management Delete');


    Route::resource('/clients', ClientController::class);

    Route::post('/locations/{id}/update-status', [LocationController::class, 'updateStatus'])->name('locations.updateStatus');
    Route::resource('/locations', LocationController::class);
    Route::resource('/roles', RoleController::class);
    Route::resource('/permissions', PermissionController::class);


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/site-setting',[SettingController::class,'sitesetting'])->name('view.sitesetting');
    Route::get('/d-flo-setting',[SettingController::class,'dflosetting'])->name('view.dflosetting');
    Route::get('/core-practice-setting',[SettingController::class,'corepracticesetting'])->name('view.corepracticesetting');
    Route::put('settings/{setting?}', [SettingController::class, 'update'])->name('settings.update');
    Route::resource('/settings', SettingController::class);

    // extended

    Route::get('/create-client',[SettingController::class,'createClient']);
    Route::get('/client-list',[SettingController::class,'createList']);
    Route::get('/client-locations',[SettingController::class,'clientLocation']);
    Route::get('/client-all-locations',[SettingController::class,'clientAllLocation']);

    Route::get('/admin-client-settings',[SettingController::class,'AdminClientSetting']);

    Route::get('/only-client-settings',[SettingController::class,'ClientSetting']);


    Route::get('/patient',[HomeController::class,'patientlist'])->name('view.patient');
    Route::get('/appointment',[HomeController::class,'appointment'])->name('view.appointment');
    // Route::get('/users',[HomeController::class,'userlist'])->name('view.users');
    Route::get('/location',[HomeController::class,'locationlist'])->name('view.location');
    Route::get('/calendars',[HomeController::class,'calendar'])->name('view.calendar');
    Route::get('/patientdata',[HomeController::class,'patientdata'])->name('view.patientdata');
    Route::get('/appointment-create',[HomeController::class,'appointmentGhlCore'])->name('view.Ghlappointment');
    Route::get('/appointment-skip',[HomeController::class,'skipappointGhl'])->name('skip.Ghlappointment');
    Route::get('/appointments-skip',[HomeController::class,'skipappointCore'])->name('skip.Coreappointment');
    Route::get('/api-ghl-setting',[HomeController::class,'GhlApiSetting'])->name('GhlApiSetting');

    // Route::get('{any}',[DashboardController::class,'index']);
    Route::get('/index', [DashboardController::class, 'index'])->name('index');

});







