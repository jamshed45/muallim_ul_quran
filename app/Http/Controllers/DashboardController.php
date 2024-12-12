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

        return view('dashboard.index');
    }

}
