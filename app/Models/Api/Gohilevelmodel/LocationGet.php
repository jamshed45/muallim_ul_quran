<?php

namespace App\Models\Api\Gohilevelmodel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationGet extends Model
{
    use HasFactory;

    protected $table = "gohighlevel__location";
    public $timestamps = false;
    protected $guarded = [];

}
