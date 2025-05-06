<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WarrantyClaim extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'warranty_id',
        'claim_date',
        'description',
        'status',
        'resolution',
        'resolution_date',
        'user_id',
        'technician_id',
        'note',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'claim_date' => 'date',
        'resolution_date' => 'date',
    ];

    /**
     * Get the warranty that this claim belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function warranty()
    {
        return $this->belongsTo(Warranty::class);
    }

    /**
     * Get the user who recorded this claim.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the technician who handled this claim.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function technician()
    {
        return $this->belongsTo(User::class, 'technician_id');
    }
}
