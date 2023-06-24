<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Subproduct;
use App\Models\ProductSize;
use App\Models\ColorProduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [ 'name', 'description', 'image', 'price', 'discount_price', 'category_id'];
    protected $table = 'products';


    public  function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function Subproducts(){
        return $this->hasMany(Subproduct::class, 'product_id');
    }

    public function productColor(){
        return $this->hasMany(ColorProduct::class, 'product_id');
    }

    public function productSize(){
        return $this->hasMany(ProductSize::class, 'product_id');
    }
}
