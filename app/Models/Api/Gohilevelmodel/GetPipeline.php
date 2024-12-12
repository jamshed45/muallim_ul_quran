<?php

namespace App\Models\Api\Gohilevelmodel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GetPipeline extends Model
{
    use HasFactory;

    protected $table="gohighlevel_pipelines";
    public $timestamps = false;
    protected $guarded = []; 
}
