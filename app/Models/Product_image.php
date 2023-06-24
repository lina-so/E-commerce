<?php

namespace App\Models;

use App\Models\Subproduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product_image extends Model
{
    use HasFactory;
    protected $fillable = ['subproduct_id', 'image'];
    protected $table = 'product_images';

    public function Subproducts()
    {
        return $this->belongsTo(Subproduct::class);
    }
}

