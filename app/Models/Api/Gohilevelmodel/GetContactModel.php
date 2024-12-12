<?php

namespace App\Models\Api\Gohilevelmodel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GetContactModel extends Model
{
    use HasFactory;
    protected $table="gohighlevel_allcontacts";
    public $timestamps = false;
    protected $guarded = [];

}
