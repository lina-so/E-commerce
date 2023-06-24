<?php

namespace App\Models;

use App\Models\Size;
use App\Models\User;
use App\Models\Color;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subproduct extends Model
{
    use HasFactory;
    protected $fillable = ['category_id','product_id','description','image','image_path','name','price','discount_price','quantity'];

    protected $table = 'subproducts';




    public function colors()
    {
       return $this->belongsToMany(Color::class,'color_products');
    }

    public function sizes()
    {
       return $this->belongsToMany(Size::class,'product_sizes');
    }

    public function users()
    {
       return $this->belongsToMany(User::class,'favoraites');
    }

    public function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function categoey(){
        return $this->belongsTo(Category::class, 'category_id');
    }
}
