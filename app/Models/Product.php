<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'sku',
        'price',
        'cost',
        'category_id',
        'unit_id',
        'description',
        'barcode',
        'is_serial_tracked',
        'min_stock_level',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'price' => 'decimal:2',
        'cost' => 'decimal:2',
        'is_serial_tracked' => 'boolean',
    ];

    /**
     * Get the category that owns the product
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the unit that owns the product
     */
    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }

    /**
     * Get the attribute values for the product
     */
    public function attributeValues(): HasMany
    {
        return $this->hasMany(ProductAttributeValue::class);
    }

    /**
     * Get the images for the product
     */
    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    /**
     * Get the stocks for the product
     */
    public function stocks(): HasMany
    {
        return $this->hasMany(ProductStock::class);
    }

    /**
     * Get the serials for the product
     */
    public function serials(): HasMany
    {
        return $this->hasMany(ProductSerial::class);
    }

    /**
     * Get the bundle items where this product is the main bundle
     */
    public function bundleItems(): HasMany
    {
        return $this->hasMany(ProductBundle::class, 'bundle_product_id');
    }

    /**
     * Get the bundles where this product is used as a component
     */
    public function partOfBundles(): HasMany
    {
        return $this->hasMany(ProductBundle::class, 'component_product_id');
    }
}