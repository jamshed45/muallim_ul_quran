<?php

namespace App\Models\Api\Gohilevelmodel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllContactsGetGhlIso extends Model
{
    use HasFactory;
    
    protected $connection = 'second_db';
    protected $primaryKey = 'id';
    protected $table='gohighlevel_allcontacts'; 
    public $timestamps = false;
    protected $guarded = []; 

}
