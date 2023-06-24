<?php

namespace App\Http\Controllers\product;

use App\Models\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        $products = Category::with(['product'])->get();

        return view('category.index', compact('categories','products'));
    }
/*************************************************************************************************/
    public function create()
    {
        $categories = Category::all();
        return view('category.add', compact('categories'));

    }
/*************************************************************************************************/

    public function store(CategoryRequest $request)
    {
        $validated=$request->validated();


        $Category = new Category();
        $Category->name = $request->name;


                   // insert img
                   if ($request->hasFile('photo')) {
                    $file = $request->file('photo');
                    $filename = 'cat.jpg';
                    $Category->photo = $filename;
                    // $Product->image_path = 'Attachments/' . $Category->name . '/' . $filename;
                    $file->move('Attachments/' . $Category->name, $filename);
                    dd($Category->photo);
                }

        $Category->save();

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

public function update(CategoryRequest $request, $id)

    {
        $validated=$request->validated();

        $Category = Category::findOrFail($id);
        $Category->name = $request->name;


            // insert img
            if ($request->hasFile('photo')) {

                $image = $request->file('photo');
                $file_name = $image->getClientOriginalName();

                $Category->photo = $file_name;

                // move pic
                $imageName = $request->photo->getClientOriginalName();
                $request->photo->move(public_path('Attachments/' . $file_name), $file_name);
            }
        $Category->save();
        return back();
    }
/*************************************************************************************************/


public function destroy($id)
{
    $Category = Category::find($id);

    $Category->delete();
    return back();
}
}
