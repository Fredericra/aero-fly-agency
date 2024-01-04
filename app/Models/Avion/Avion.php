<?php

namespace App\Models\Avion;

use App\Models\Avion\VipPlace;
use App\Models\Campagnie\Campagnie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Avion extends Model
{
    use HasFactory;
    public $fillable = ['campagnie_id','mark','place','image'];
    /**
     * Get the user associated with the Avion
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function vip(): HasOne
    {
        return $this->hasOne(VipPlace::class);
    }
    /**
     * Get the compagnie that owns the Avion
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function compagnie(): BelongsTo
    {
        return $this->belongsTo(Campagnie::class,'campagnie_id');
    }
}
