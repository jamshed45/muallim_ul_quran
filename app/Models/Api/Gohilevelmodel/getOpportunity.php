<?php

namespace App\Models\Api\Gohilevelmodel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class getOpportunity extends Model
{
    use HasFactory;

    protected $table="gohighlevel_opportunity";
    public $timestamps = false;
    protected $guarded = []; 
}
