<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoreLocationAppointments extends Model
{
    use HasFactory;

    protected $table="booking_locationappointment";
    public $timestamps = false;
    protected $guarded = []; 
}
