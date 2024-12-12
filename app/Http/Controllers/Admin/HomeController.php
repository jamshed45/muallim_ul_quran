<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\UserModel;
use App\Models\Api\Gohilevelmodel\GetContactModel;
use App\Models\Api\GetPatientModel;
use App\Models\Api\UserLocationsModel;
use App\Models\Api\Gohilevelmodel\LocationGet;
use App\Models\Api\UserCalendarModel;
use App\Models\Api\Gohilevelmodel\GoHighLevelCalendarGet;
use App\Models\Api\GetAppointmentModel;
use App\Models\Api\Gohilevelmodel\GetAppointment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Models\Api\Gohilevelmodel\Authoriz;
use App\Models\Api\GetTokenMod;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function patientlist(Request $request)
    {

        DB::enableQueryLog(); // Enable query log

        $get_client_id = $request->query('client_id');
        $user = Auth::user();

        $output = GetPatientModel::query()
            ->when($user->hasRole('Client'), function ($query) use ($user) {

                $query->where('clientId', $user->id);
            })
            ->when($user->hasRole('Super Admin'), function ($query) use ($get_client_id) {
                if ($get_client_id) {

                    $query->where('clientId', $get_client_id);
                }
            })
            ->orderBy('id', 'desc')
            ->get();


        $client_id = $get_client_id ? $get_client_id: '';

        // Get the query log
        $queries = DB::getQueryLog();
        // dd($queries);


        return view('admin.sendapidata.patient', compact('output', 'client_id'));
    }

    public function appointment(Request $request)
    {
        $get_client_id = $request->query('client_id');
        $user = Auth::user();

        $output = GetAppointmentModel::query()
            ->when($user->hasRole('Client'), function ($query) use ($user) {
                echo $user->id;
                $query->where('clientId', $user->id);
            })
            ->when($user->hasRole('Super Admin') && $get_client_id, function ($query) use ($get_client_id) {
                $query->where('clientId', $get_client_id);
            })
            ->orderBy('id', 'desc')
            ->get();


            $client_id = $get_client_id ? $get_client_id: '';

        return view('admin.sendapidata.appointment',compact('output', 'client_id'));

    }

    public function userlist()
    {
        $output =  DB::table('users')->select('userId','name','firstname','lastname','email','phone','roles','permissions','extension','created_at')->get();
        return view('admin.sendapidata.users',compact('output'));
    }

    public function locationlist()
    {
        $output = UserLocationsModel::select('state','phone','email','name','address','country','website','logoUrl')->get();
        return view('admin.sendapidata.location',compact('output'));
    }

    public function calendar()
    {
        $output = UserCalendarModel::select('calendarid','calendarType','description','name','created_at')->get();
         return view('admin.sendapidata.calendar',compact('output'));
    }

    public function patientdata(Request $request)
    {

        $get_client_id = $request->query('client_id');
        $user = Auth::user();

        $GetPatient = GetContactModel::query()
            ->when($user->hasRole('Client'), function ($query) use ($user) {
                echo $user->id;
                $query->where('clientId', $user->id);
            })
            ->when($user->hasRole('Super Admin') && $get_client_id, function ($query) use ($get_client_id) {
                $query->where('clientId', $get_client_id);
            })
            ->orderBy('id', 'desc')
            ->get();


            $client_id = $get_client_id ? $get_client_id: '';



        return view('admin.ghltocoredata.patientdata',compact('GetPatient', 'client_id'));
    }

    public function appointmentGhlCore(Request $request)
    {

        $get_client_id = $request->query('client_id');
        $user = Auth::user();

        $appoint = DB::table('gohighlevel_appointments')
        ->join('gohighlevel_allcontacts', 'gohighlevel_appointments.contactId', '=', 'gohighlevel_allcontacts.contactId')
        ->select('gohighlevel_appointments.*', 'gohighlevel_allcontacts.firstName', 'gohighlevel_allcontacts.lastName', 'gohighlevel_allcontacts.email')
        ->when($get_client_id, function ($query, $get_client_id) {
            return $query->where('gohighlevel_appointments.clientId', $get_client_id);
        })
        ->orderBy('gohighlevel_appointments.id', 'desc')
        ->get();

        $client_id = $get_client_id ? $get_client_id: '';



        return view('admin.ghltocoredata.appointments',compact('appoint', 'client_id'));
    }


    public function skipappointGhl(Request $request)
    {

        $get_client_id = $request->query('client_id');
        $user = Auth::user();
        $userRole = $user->getRoleNames()->first();

        $skipappointmentGhl = DB::table('gohighlevel_appointments')
        ->select('id', 'appoinmentStatus', 'contactId', 'title', 'startTime', 'endTime', 'skipstatusname')
        ->where('skipdAppointment', 1)
        ->when($userRole === 'Client', function ($query) use ($user) {
            return $query->where('clientId', $user->id);
        })
        ->when($userRole === 'Super Admin' && $get_client_id, function ($query) use ($get_client_id) {
            return $query->where('clientId', $get_client_id);
        })
        ->when($userRole === 'Super Admin' && !$get_client_id, function ($query) {
            return $query; // No additional filtering needed
        })
        ->get();

        $client_id = $get_client_id ? $get_client_id: '';


        return view('admin.ghltocoredata.skipappointments',compact('skipappointmentGhl', 'client_id'));
    }

     public function skipappointCore(Request $request)
    {

        $get_client_id = $request->query('client_id');
        $user = Auth::user();
        $userRole = $user->getRoleNames()->first();


        $skipappointmentcore = DB::table('booking_get_appointment')
        ->select('id', 'appointmentId', 'email', 'title', 'startTime', 'endTime', 'skipstatusname', 'Patient')
        ->where('skipdAppointment', 1)
        ->when($userRole === 'Client', function ($query) use ($user) {
            return $query->where('clientId', $user->id);
        })
        ->when($userRole === 'Super Admin' && $get_client_id, function ($query) use ($get_client_id) {
            return $query->where('clientId', $get_client_id);
        })
        ->when($userRole === 'Super Admin' && !$get_client_id, function ($query) {
            return $query; // No additional filtering needed
        })
        ->get();

        $client_id = $get_client_id ? $get_client_id: '';



        return view('admin.sendapidata.skipappointmentscore',compact('skipappointmentcore', 'client_id'));
    }


    public function GhlApiSetting(Request $request)
    {
         $AuthKey = DB::table('authorization_access_token')->select('*')->get();
        return view('admin.ghltocoredata.apisetting',compact('AuthKey'));
    }

      public function livedataeditGhl($id)
    {
        $liveData = Authoriz::find($id);

        return view('admin.ghltocoredata.editapidata',compact('liveData'));
    }

        public function CoreApiSetting(Request $request)
    {
         $AuthKey = DB::table('authorization_token_core')->select('*')->get();
        return view('admin.sendapidata.apisettingcore',compact('AuthKey'));
    }

     public function corelivedata($id)
    {
        $liveData = GetTokenMod::find($id);

        return view('admin.sendapidata.editapilive',compact('liveData'));
    }

    public function corepractice(Request $request)
    {
        dd($request->all());
    // cMnqfHiukVskU6MWywSG userid
    // 1LR61C8X7hyE89I23bHx locatin
    // S7yLvs6RYXhzDCRvst68 compny

    }

    public function GetCode(Request $request)
    {


       $tokekn = GetTokenMod::get()->first();
      $accesstoken = $tokekn->access_token;
      $locationIdCore = $tokekn->locationId;
      $url = $tokekn->liveurl;
      $status = $tokekn->livestatus;



                   $curl2 = curl_init();

                      curl_setopt_array($curl2, array(
                      CURLOPT_URL => "$url/patients/search?cardno&firstname=n&lastname=d",
                      CURLOPT_RETURNTRANSFER => true,
                      CURLOPT_ENCODING => '',
                      CURLOPT_MAXREDIRS => 10,
                      CURLOPT_TIMEOUT => 0,
                      CURLOPT_FOLLOWLOCATION => true,
                      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                      CURLOPT_CUSTOMREQUEST => 'GET',
                      CURLOPT_HTTPHEADER => array(
                          'Content-Type: application/json',
                          "Authorization: Bearer $accesstoken",
                          'x-cpapi-version: v2'
                      ),
                      ));

                    //   $responseall = curl_exec($curl2);

                      curl_close($curl2);
                     $alldata = json_decode($responseall,true);





                     echo '<pre>';
                     print_r($alldata);die();


    }

       public function liveurl(Request $request)
    {
        dd($request->all());
    }





}
