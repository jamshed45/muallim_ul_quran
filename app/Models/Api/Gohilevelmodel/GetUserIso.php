<?php

namespace App\Models\Api\Gohilevelmodel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GetUserIso extends Model
{
    use HasFactory;

    protected $connection = 'second_db';
    protected $table="gohighlevel_user_get";
    public $timestamps = false;
    protected $guarded = []; 
}
