<?php

namespace App\Models\vole;

use App\Models\Vole\Vole;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DateVole extends Model
{
    use HasFactory;
  
    protected $fillable = ['vole_id','DateDepart','TimeDepart','DateArrive','TimeArrive','confirmed'];

    /**
     * Get the vole that owns the DateVole
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vole(): BelongsTo
    {
        return $this->belongsTo(Vole::class);
    }
}
