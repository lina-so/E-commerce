<?php

namespace App\Models;

use App\Models\Subproduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Color extends Model
{
    use HasFactory;
    protected $fillable = ['color'];


    public function subproduct()
    {
        return $this->belongsToMany(Subproduct::class,'product_colors');
    }
}
