<?php

namespace App\Models\Agency;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fling extends Model
{
    use HasFactory;
    protected $fillable = ['campagnie_id','date','heureDepart','heureArrive','avion_id','departPlace','arrivePlace'];

}
