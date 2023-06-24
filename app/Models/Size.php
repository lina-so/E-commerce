<?php

namespace App\Models;

use App\Models\Subproduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Size extends Model
{
    use HasFactory;
    protected $fillable = ['size'];


    public function subproduct()
    {
        return $this->belongsToMany(Subproduct::class,'product_sizes');
    }
}
