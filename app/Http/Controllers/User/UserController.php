<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Department;
use App\Models\Product;
use App\Models\Rate;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $category = Category::all();
        $category_count = count($category);
        $department = Department::all();
        $department_count = count($department);
        $brand = Brand::all();
        $brand_count = count($brand);
        $rates = Rate::all();
        $product = Product::all();
        $product_count = count($product);
        return view('user.home', [
            'category_count' => $category_count,
            'department_count' => $department_count,
            'brand_count' => $brand_count,
            'rates' => $rates,
            'product_count' => $product_count
        ]);
    }

    //Basic information
    public function profile()
    {
        return view('user.profile.index');
    }
    public function updateData(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ],
            [
                'name.required' => 'Your name is required',
                'email.required' => 'Your email is required',
            ]);
        User::findOrFail(Auth::id())->update([
            'name' => $request->name,
            'email' => $request->email,
            'updated_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Your profile has been updated',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    //Update password
    public function passwordPage()
    {
        return view('user.profile.change-password');
    }
    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8|different:old_password',
            'password_confirmation' => 'required'
        ], [
            'old_password.required' => 'Please enter your current password',
            'new_password.required' => 'Please enter your new password and new password must be different form current password',
            'password_confirmation.required' => 'New password and confirm password does not matched',
        ]);

        $db_pass = Auth::user()->password;
        $current_password = $request->old_password;
        $newpass = $request->new_password;
        $confirmpass = $request->password_confirmation;

        if (Hash::check($current_password,$db_pass)) {
            if ($newpass === $confirmpass) {
                User::findOrFail(Auth::id())->update([
                    'password' => Hash::make($newpass)
                ]);

                Auth::logout();
                $notification=array(
                    'message'=>'Your Password Change Success. Now Login With New Password',
                    'alert-type'=>'success'
                );
                return Redirect()->route('login')->with($notification);

            }else {

                $notification=array(
                    'message'=>'New Password And Confirm Password Not Same',
                    'alert-type'=>'error'
                );
                return Redirect()->back()->with($notification);
            }
        }else {
            $notification=array(
                'message'=>'Old Password Not Match',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }

    }

    //Product section
    public function productList()
    {
        $products = Product::all();
        $rates = Rate::where('id', 1)->get();
        return view('user.product.index', [
            'products' => $products,
            'rates' => $rates
        ]);
    }

    //Category index
    public function categoryList()
    {
        $roles = Role::where('id', 1)->get();
        $categories = Category::all();
        return view('user.category.index', [
            'categories' => $categories,
            'roles' => $roles
        ]);
    }
    //Category create
    public function categoryStore(Request $request)
    {
        $image = $request->file('icon');
        $imageName = hexdec(uniqid()).'.'.$image->getClientOriginalName();
        $directory = 'img/category/';
        $image->move($directory, $imageName);
        $imageUrl = $directory.$imageName;

        $request->validate([
            'name' => 'required',
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->icon = $imageUrl;
        $category->status = 0;
        $category->save();

        $notification=array(
            'message'=>'Category has been added successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('user.category.list')->with($notification);
    }
}
