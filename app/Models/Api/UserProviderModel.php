<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProviderModel extends Model
{
    use HasFactory;

    protected $table="user_providers";
    public $timestamps = false;
    protected $guarded = []; 
}
