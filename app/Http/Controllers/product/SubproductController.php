<?php

namespace App\Http\Controllers\product;

use App\Models\Size;
use App\Models\Color;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subproduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubproductRequest;

class SubproductController extends Controller
{
/*************************************************************************************************/

    public function index()
    {
        $productsWithSubproduct = Product::with(['Subproducts'])->get();
        $categories = Category::all();
        $subproducts = Subproduct::with(['colors'])->with(['sizes'])->get();

        // dd($subproducts);
        return view('subproduct.index',compact('subproducts','categories','productsWithSubproduct'));
    }
/*************************************************************************************************/

    public function create()
    {
        $subproducts=Subproduct::all();
        $categories = Category::all();
        $products = Product::all();
        $colors = Color::all();
        $sizes = Size::all();


        return view('subproduct.add',compact('subproducts','categories','products','sizes','colors'));
    }
/*************************************************************************************************/

    public function browse(){
        $subproductsWithInfo = Subproduct::with(['colors'])->with(['sizes'])->get();
        $subproducts = Subproduct::all();

        // dd($subproducts);
        return view('subproduct.show',compact('subproductsWithInfo','subproducts'));
    }
/*************************************************************************************************/

    public function details($id)
    {
        $subproduct = Subproduct::findOrFail($id)->with(['colors'])->with(['sizes'])->first();
        // dd($subproduct);

        return view('subproduct.details',compact('subproduct'));

    }
/*************************************************************************************************/

    public function store(SubproductRequest $request)
    {

        $validated=$request->validated();

        $Product = new Subproduct();
        $Product->category_id = $request->category_id;
        $Product->product_id = $request->product_id;
        $Product->description = $request->description;
        $Product->name = $request->name;
        $Product->price = $request->price;
        $Product->discount_price = $request->discount_price;
        $Product->quantity = $request->quantity;


                // insert img
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = 'img.jpg';
            $Product->image = $filename;
            $Product->image_path = 'images/' . $Product->name . '/' . $filename;
            $file->move('images/' . $request->name, $filename);
            // dd($Product->image);
        }




        // dd($request->size_id);
        $Product->save();

        $Product->colors()->attach($request->color_id);
        $Product->sizes()->attach($request->size_id);

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

    public function update(SubproductRequest $request, Category $category)
    {
        //
    }


    public function destroy(Category $category)
    {
        //
    }
}
