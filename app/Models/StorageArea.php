<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StorageArea extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
        'capacity',
        'description'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function getAvailableSpaceAttribute()
    {
        $usedSpace = $this->products()->sum('quantity');
        return $this->capacity - $usedSpace;
    }
}