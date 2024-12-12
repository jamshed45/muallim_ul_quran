<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GetPatientModel;

class getPatientController extends Controller
{
    public function index()
    {

        $records = GetPatientModel::orderBy('id','desc')->get();
        return view('get_patient.index', compact('records'));

    }
}
