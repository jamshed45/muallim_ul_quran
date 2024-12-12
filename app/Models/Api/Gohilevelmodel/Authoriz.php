<?php

namespace App\Models\Api\Gohilevelmodel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Authoriz extends Model
{
    use HasFactory;

    protected $table="authorization_access_token";
    public $timestamps = false;
    protected $guarded = [];
}
