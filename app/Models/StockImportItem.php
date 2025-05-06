<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StockImportItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'import_id',
        'product_id',
        'quantity',
        'cost',
        'total',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'quantity' => 'integer',
        'cost' => 'decimal:2',
        'total' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    /**
     * Get the stock import that this item belongs to.
     */
    public function stockImport()
    {
        return $this->belongsTo(StockImport::class, 'import_id');
    }

    /**
     * Get the product being imported.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
