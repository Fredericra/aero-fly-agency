<?php

namespace App\Models\Inbox;

use App\Models\Inbox\Mail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MessageMail extends Model
{
    use HasFactory;
    protected $fillable = ['message'];


    /**
     * Get the mails that owns the MessageMail
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mails(): BelongsTo
    {
        return $this->belongsTo(Mail::class);
    }
}
