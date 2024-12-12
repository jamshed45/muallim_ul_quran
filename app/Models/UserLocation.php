<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLocation extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table="user_locations";
    protected $fillable = ['client_id', 'core_location_id', 'ghl_location_id', 'location_name', 'location_address', 'status'];

}
