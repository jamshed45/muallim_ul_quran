<?php

namespace App\Models\Api\Gohilevelmodel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class getnotificationghl extends Model
{
    use HasFactory;

    protected $table="notificationghlappointment";
    public $timestamps = false;
    protected $guarded = []; 
}
