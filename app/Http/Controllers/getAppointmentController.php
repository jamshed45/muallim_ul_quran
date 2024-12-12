<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GetAppointmentModel;

class getAppointmentController extends Controller
{
    public function index()
    {

        $records = GetAppointmentModel::orderBy('id','desc')->get();
        return view('get_appointment.index', compact('records'));

    }
}
