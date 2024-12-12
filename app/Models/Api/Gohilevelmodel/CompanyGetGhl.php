<?php

namespace App\Models\Api\Gohilevelmodel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyGetGhl extends Model
{
    use HasFactory;

    protected $table="gohighlevel_company";
    public $timestamps = false;
    protected $guarded = []; 
}
