<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Api\GetPatientModel;
use App\Models\Api\Gohilevelmodel\AllContactsGetGhl;
use App\Models\Api\GetAppointmentModel;
use App\Models\Api\Gohilevelmodel\GetAppointment;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function index()
    {

        $user = Auth::user();
        $roles = $user->getRoleNames();




        if ($roles->contains('Client')) {

            $totalPatientCore = GetPatientModel::where('clientId', $user->id)->count();
            $totalGhlPatient = AllContactsGetGhl::where('clientId', $user->id)->count();
            $totalpatient = $totalPatientCore + $totalGhlPatient;

            $totalCoreAppoint = GetAppointmentModel::where('clientId', $user->id)->count();
            $totalGhlAppoint = GetAppointment::where('clientId', $user->id)->count();
            $totalAppoint = $totalCoreAppoint + $totalGhlAppoint;

            $coreAppoint = GetAppointmentModel::where('clientId', $user->id)->get();

        } else {

            $totalPatientCore = GetPatientModel::count();
            $totalGhlPatient = AllContactsGetGhl::count();
            $totalpatient = $totalPatientCore + $totalGhlPatient;

            $totalCoreAppoint = GetAppointmentModel::count();
            $totalGhlAppoint = GetAppointment::count();
            $totalAppoint = $totalCoreAppoint + $totalGhlAppoint;

            $coreAppoint = GetAppointmentModel::get();

        }

        return view('dashboard.index',compact('totalpatient','totalPatientCore','totalGhlPatient','totalCoreAppoint','totalGhlAppoint','totalAppoint','coreAppoint'));
    }

}
