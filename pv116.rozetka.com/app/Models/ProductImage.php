<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $table = 'product_images';
    use HasFactory;

    protected $fillable = [
        'name',
        'product_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
