<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GetPatientModel extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'id';
    protected $table="patients_get";
    public $timestamps = false;
    protected $guarded = []; 
}
