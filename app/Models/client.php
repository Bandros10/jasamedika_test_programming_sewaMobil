<?php

namespace App\Models;

use App\Models\User;
use App\Models\Pengembalian;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class client extends Model
{
    use HasFactory;

    protected $guarded =[];

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all of the comments for the client
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Booking(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    public function Pengembalian(): HasMany
    {
        return $this->hasMany(Pengembalian::class);
    }
}
