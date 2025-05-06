<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'code',
        'contact_person',
        'contact_phone',
        'address',
        'tax_code',
        'email',
        'phone',
        'current_debt',
        'is_active',
        'bank_name',
        'bank_account',
        'bank_branch',
        'notes',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'current_debt' => 'decimal:2',
        'is_active' => 'boolean',
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
