<?php

namespace App\Models;

use App\Models\Pivots\OrderProduct;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)
            ->using(OrderProduct::class)
            ->withPivot('quantity');
    }

    public function orderProducts(): HasMany
    {
        return $this->hasMany(OrderProduct::class);
    }

    protected static function newFactory()
    {
        return \Database\Factories\OrderFactory::new();
    }
}
