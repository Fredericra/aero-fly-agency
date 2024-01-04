<?php

namespace App\Models\Reservation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestBillet extends Model
{
   
    protected $fillable = ['vole_id','VipRest','ClassRest','totalRest','stop'];
    use HasFactory;
}
