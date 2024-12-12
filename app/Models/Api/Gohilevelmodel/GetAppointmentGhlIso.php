<?php

namespace App\Models\Api\Gohilevelmodel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GetAppointmentGhlIso extends Model
{
    use HasFactory;

    protected $connection = 'second_db';
    protected $table="gohighlevel_appointments";
    public $timestamps = false;
    protected $guarded = []; 
}
