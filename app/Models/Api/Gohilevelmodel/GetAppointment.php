<?php

namespace App\Models\Api\Gohilevelmodel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GetAppointment extends Model
{
    use HasFactory;

    protected $table="gohighlevel_appointments";
    public $timestamps = false;
    protected $guarded = []; 
}
