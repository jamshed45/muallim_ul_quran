<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLocationsModel extends Model
{
    use HasFactory;

    protected $table="user_locations";
    public $timestamps = false;
    protected $guarded = []; 
}
