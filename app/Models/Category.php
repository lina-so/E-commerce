<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'photo'];
    protected $table = 'categories';



    public function product(){
        return $this->hasMany(Product::class, 'category_id');
    }
}
