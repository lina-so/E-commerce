<?php

namespace App\Http\Controllers\product;

use App\Models\Product;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
/*************************************************************************************************/

    public function index()
    {
        $products = Product::all();
        $categories = Category::all();

        return view('product.index', compact('products','categories'));

    }

/*************************************************************************************************/
    public function create()
    {
        //
    }

/*************************************************************************************************/

    public function store(ProductRequest $request)
    {
        $validated=$request->validated();

        $Product = new Product();
        $Product->name = $request->name;
        $Product->category_id = $request->category_id;


        $Product->save();

        return back();
    }

/*************************************************************************************************/

    public function show(Category $category)
    {
        //
    }

/*************************************************************************************************/

    public function edit(Category $category)
    {
        //
    }
/*************************************************************************************************/


    public function update(ProductRequest $request, $id)
    {
        $validated=$request->validated();

        $Product = Product::findOrFail($id);

        $Product->name = $request->name;
        $Product->category_id = $request->category_id;
        $Product->update();

        return back();
    }
/*************************************************************************************************/


    public function destroy($id)
    {
        $Product = Product::find($id);
        $Product->delete();
        return back();
    }
}
