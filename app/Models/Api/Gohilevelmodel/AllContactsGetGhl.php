<?php

namespace App\Models\Api\Gohilevelmodel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllContactsGetGhl extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table='gohighlevel_allcontacts'; 
    public $timestamps = false;
    protected $guarded = []; 

}
