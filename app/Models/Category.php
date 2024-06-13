<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    public $timestamps = false;
    protected $guarded = [];
//    use HasFactory;

    public function products (): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
