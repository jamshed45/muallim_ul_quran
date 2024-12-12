<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCalendar extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table="user_calendars";
    protected $fillable = ['client_id', 'location_id', 'core_calender_id', 'ghl_calender_id'];

}
