<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GetTokenMod extends Model
{
    use HasFactory;

    protected $table="authorization_token_core";
    public $timestamps = false;
    protected $guarded = [];

}
