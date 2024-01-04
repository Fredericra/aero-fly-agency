<?php

namespace App\Models\Avion;

use App\Models\Avion\Avion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VipPlace extends Model
{
    use HasFactory;
    protected $fillable = ['avion_id','VIP','placeVIP','place'];
    /**
     * Get the Avion that owns the VipPlace
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Avion(): BelongsTo
    {
        return $this->belongsTo(Avion::class, 'avion_id');
    }
}
