<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Department;
use App\Models\Product;
use App\Models\Rate;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //Product index
    public function productList()
    {
        $products = Product::all();
        $rates = Rate::where('id', 1)->get();
        return view('admin.product.index', [
            'products' => $products,
            'rates' => $rates
        ]);
    }
    //Product create
    public function productCreate()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $departments = Department::all();
        return view('admin.product.create', [
            'categories' => $categories,
            'brands' => $brands,
            'departments' => $departments
        ]);
    }
    public function productStore(Request $request)
    {
        $image = $request->file('image');
        $imageName = hexdec(uniqid()).'.'.$image->getClientOriginalName();
        $directory = 'img/product/';
        $image->move($directory, $imageName);
        $imageUrl = $directory.$imageName;

        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'brand_id' => 'required',
            'category_id' => 'required',
            'department_id' => 'required',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->department_id = $request->department_id;
        $product->image = $imageUrl;
        $product->save();

        $notification=array(
            'message'=>'Product has been added successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('product.list')->with($notification);
    }
    //Brand update
    public function productEdit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $brands = Brand::all();
        $departments = Department::all();
        return view('admin.product.edit', [
            'categories' => $categories,
            'brands' => $brands,
            'departments' => $departments,
            'product' => $product
        ]);
    }
    public function productUpdate(Request $request)
    {
        $id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('image'))
        {
            $request->validate([
                'name' => 'required',
                'price' => 'required',
                'brand_id' => 'required',
                'category_id' => 'required',
                'department_id' => 'required',
            ],[
                'name.required' => 'Enter product name',
                'price.required' => 'Enter product price',
                'brand_id.required' => 'Enter product brand',
                'category_id.required' => 'Enter product category',
                'department_id.required' => 'Enter product department',
            ]);

            unlink($old_img);
            $image = $request->file('image');
            $imageName = hexdec(uniqid()).'.'.$image->getClientOriginalName();
            $directory = 'img/product/';
            $image->move($directory, $imageName);
            $save_url = $directory.$imageName;
            Product::findOrFail($id)->Update([
                'name' => $request->name,
                'price' => $request->price,
                'brand_id' => $request->brand_id,
                'category_id' => $request->category_id,
                'department_id' => $request->department_id,
                'image' => $save_url,
                'updated_at' => Carbon::now(),
            ]);
        }
        else
        {
            $request->validate([
                'name' => 'required',
                'price' => 'required',
                'brand_id' => 'required',
                'category_id' => 'required',
                'department_id' => 'required',
            ],[
                'name.required' => 'Enter product name',
                'price.required' => 'Enter product price',
                'brand_id.required' => 'Enter product brand',
                'category_id.required' => 'Enter product category',
                'department_id.required' => 'Enter product department',
            ]);

            Product::findOrFail($id)->Update([
                'name' => $request->name,
                'price' => $request->price,
                'brand_id' => $request->brand_id,
                'category_id' => $request->category_id,
                'department_id' => $request->department_id,
                'updated_at' => Carbon::now(),
            ]);

        }

        $notification=array(
            'message'=>'Product has been updated successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('product.list')->with($notification);
    }
    //Product delete
    public function productDelete($id){
        $product = Product::findOrFail($id);
        $img = $product->image;
        unlink($img);
        Product::findOrFail($id)->delete();
        $notification=array(
            'message'=>'Product has been deleted successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}
