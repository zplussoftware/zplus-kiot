<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'contact_info',
        'address',
        'tax_code',
        'email',
        'phone',
        'debt_total',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'debt_total' => 'decimal:2',
    ];

    /**
     * Get the debts for this supplier.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function debts()
    {
        return $this->hasMany(SupplierDebt::class);
    }

    /**
     * Get the stock imports from this supplier.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function stockImports()
    {
        return $this->hasMany(StockImport::class);
    }
}
