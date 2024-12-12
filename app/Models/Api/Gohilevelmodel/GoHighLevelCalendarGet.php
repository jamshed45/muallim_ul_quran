<?php

namespace App\Models\Api\Gohilevelmodel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoHighLevelCalendarGet extends Model
{
    use HasFactory;

    protected $table="gohighlevel_calendars_get";
    public $timestamps = false;
    protected $guarded = []; 
}
