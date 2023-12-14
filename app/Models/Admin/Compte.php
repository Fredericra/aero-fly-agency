<?php

namespace App\Models\Admin;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\Authenticatable as authorize;

class Compte extends Model implements authorize
{
    use HasFactory;
    use Notifiable;
    use Authenticatable;
    protected $fillable = ['email',"password",'admin'];

}
