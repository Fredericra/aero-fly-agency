<?php

namespace App\Models\Image;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageCarouselle extends Model
{
    use HasFactory;
    public $fillable = ['image','text','description'];
}
