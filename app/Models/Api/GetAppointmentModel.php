<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GetAppointmentModel extends Model
{
    use HasFactory;

    protected $table="booking_get_appointment";
    public $timestamps = false;
    protected $guarded = [];
}
