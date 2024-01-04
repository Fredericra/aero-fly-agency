<?php

namespace App\Models\Campagnie;

use App\Models\Avion\Avion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Campagnie extends Model
{
    use HasFactory;
    protected $fillable = ['nom','web','pays','image'];
    
    /**
     * Get all of the comments for the Campagnie
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function avion(): HasMany
    {
        return $this->hasMany(Avion::class, 'campagnie_id');
    }
}
