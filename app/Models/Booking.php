<?php

namespace App\Models;

use App\Models\User;
use App\Models\Mobil;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the user that owns the Booking
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(client::class);
    }
    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function Pengembalian(): BelongsTo
    {
        return $this->BelongsTo(Pengembalian::class);
    }
    public function Mobil(): HasOne
    {
        return $this->hasOne(Mobil::class);
    }
}
