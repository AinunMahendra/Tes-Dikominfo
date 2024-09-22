<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
        public function products()
    {
        return $this->belongsToMany(Products::class, 'order_product')
                    ->withPivot('quantity') // Jika ingin menyimpan informasi tambahan
                    ->withTimestamps();
    }
}


