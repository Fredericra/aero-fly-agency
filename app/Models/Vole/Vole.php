<?php

namespace App\Models\Vole;

use App\Models\Avion\Avion;
use App\Models\BilletActive;
use App\Models\vole\DateVole;
use App\Models\Reservation\RestBillet;
use Illuminate\Database\Eloquent\Model;
use App\Models\Campagnie\Campagnie as Compagnie;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vole extends Model
{
    use HasFactory;
   
    protected $fillable = ['compagnie_id','avion_id','BVip','BN','depart','arriver'];

    /**
     * Get the compgnie that owns the Vole
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function compagnie(): BelongsTo
    {
        return $this->belongsTo(Compagnie::class, 'compagnie_id');
    }
    /**
     * Get the avion that owns the Vole
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function avion(): BelongsTo
    {
        return $this->belongsTo(Avion::class);
    }
  /**
   * Get the vole associated with the Vole
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasOne
   */
  public function vole(): HasOne
  {
      return $this->hasOne(DateVole::class,'vole_id');
  }
  /**
   * Get all of the billet for the Vole
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function billet(): HasMany
  {
      return $this->hasMany(BilletActive::class);
  }
  /**
   * Get the RestCard associated with the Vole
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasOne
   */
  public function RestCard(): HasOne
  {
      return $this->hasOne(RestBillet::class);
  }
}
