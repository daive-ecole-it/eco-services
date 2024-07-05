<?php

namespace App\Http\Controllers;

use App\Models\Category;
    use App\Models\Product;
use Flasher\Toastr\Prime\ToastrInterface;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function view_category(){

        $data = Category::all();
        return view('admin.category',compact('data'));
    }
    public function add_category(Request $request){
        {
            $category = new Category;
            $category->category_name = $request->category;
            $category->save();
            toastr()
            ->timeOut(1000)
            ->closeButton()
            ->success('Category added successfully.');
            return redirect()->back();
        }
    }
    public function delete_category($id){
        Category::where('id', $id)->delete();
        toastr()
        ->timeOut(1000)
        ->closeButton()
        ->warning('Category deleted successfully.');
        return redirect()->back();
    }
    public function edit_category($id){
        $data = Category::find($id);
        return view('admin.edit_category',compact('data'));
    }
    public function update_category( Request $request,$id){
        $category = Category::find($id);
        $category->category_name = $request->category;
        $category->save();
        toastr()
        ->timeOut(1000)
        ->closeButton()
        ->success('Category updated successfully.');
        return redirect('/view_category');
    }

    public function add_product(){
        $category = Category::all();
        return view('admin.add_product', compact('category'));
    }

    public function upload_product(Request $request )
    {
        $data = new Product;

        $data->title = $request->title;

        $data->description = $request->description;

        $data->price = $request->price;

        $data->quantity = $request->qty;

        $data->category = $request->category;

        $image = $request->image;
        if($image)
        {
            // convention pour uploader des images
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move('products', $imageName);
            $data->image = $imageName;
        }

        $data->save();

        return redirect()->back();
    }

    public function view_product(){
        $data = Product::all();
        return view('admin.view_product',compact('data'));
    }

}