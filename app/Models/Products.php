<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Products extends Model
{
    use HasFactory;
    protected $table = 'Products';
    protected $fillable = ['name', 'price', 'stock', 'sold'];

    

    public function orders()
    {
        return $this->belongsToMany(Orders::class, 'order_product')
                    ->withPivot('quantity')
                    ->withTimestamps();
    }
}
