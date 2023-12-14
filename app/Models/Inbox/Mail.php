<?php

namespace App\Models\Inbox;

use App\Models\Inbox\MessageMail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mail extends Model
{
    use HasFactory;
    protected $fillable = ["pseudo","email","password"];

    /**
     * Get all of the comments for the Mail
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function message(): HasMany
    {
        return $this->hasMany(MessageMail::class);
    }
}
