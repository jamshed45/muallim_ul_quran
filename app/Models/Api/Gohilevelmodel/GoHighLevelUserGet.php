<?php

namespace App\Models\Api\Gohilevelmodel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoHighLevelUserGet extends Model
{
    use HasFactory;

    protected $table="gohighlevel_user_get";
    public $timestamps = false;
    protected $guarded = []; 
}
