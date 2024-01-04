<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BilletActive extends Model
{
   
    protected $fillable = ['vole_id','compte_id','pays','passport'];
    use HasFactory,Notifiable;
}
