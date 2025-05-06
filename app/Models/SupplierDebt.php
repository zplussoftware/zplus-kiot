<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SupplierDebt extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'supplier_id',
        'import_id',
        'amount',
        'paid',
        'due_date',
        'note',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'amount' => 'decimal:2',
        'paid' => 'decimal:2',
        'due_date' => 'date',
    ];

    /**
     * Get the supplier that owns this debt.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    /**
     * Get the stock import that generated this debt.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function stockImport()
    {
        return $this->belongsTo(StockImport::class, 'import_id');
    }

    /**
     * Get the payments for this debt.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function payments()
    {
        return $this->hasMany(SupplierDebtPayment::class);
    }
}
