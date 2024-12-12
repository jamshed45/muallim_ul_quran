<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model;

class UserCalendarModel extends Model
{
    use HasFactory;

    protected $table="user_calendars";
    public $timestamps = false;
    protected $guarded = []; 
}
