<?php

namespace App\Http\Controllers\Admin;

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

class AdminController extends Controller
{
    public function index(){
        $role = Role::all();
        $role_count = count($role);
        $user = User::where('role_id', '!=', 2)->get();
        $user_count = count($user);
        $category = Category::all();
        $category_count = count($category);
        $department = Department::all();
        $department_count = count($department);
        $brand = Brand::all();
        $brand_count = count($brand);
        $rates = Rate::all();
        $product = Product::all();
        $product_count = count($product);
        return view('admin.home', [
            'role_count' => $role_count,
            'user_count' => $user_count,
            'category_count' => $category_count,
            'department_count' => $department_count,
            'brand_count' => $brand_count,
            'rates' => $rates,
            'product_count' => $product_count
        ]);
    }

    //Category index
    public function categoryList()
    {
        $roles = Role::where('id', 1)->get();
        $categories = Category::all();
        return view('admin.category.index', [
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
        return Redirect()->route('category.list')->with($notification);
    }
    //Category update
    public function categoryEdit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit',compact('category'));
    }
    public function categoryUpdate(Request $request)
    {
        $id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('icon'))
        {
            $request->validate([
                'name' => 'required',
            ],[
                'name.required' => 'Enter category name'
            ]);

            unlink($old_img);
            $image = $request->file('icon');
            $imageName = hexdec(uniqid()).'.'.$image->getClientOriginalName();
            $directory = 'img/category/';
            $image->move($directory, $imageName);
            $save_url = $directory.$imageName;
            Category::findOrFail($id)->Update([
                'name' => $request->name,
                'icon' => $save_url,
                'status' => 0,
                'updated_at' => Carbon::now(),
            ]);
        }
        else
        {
            $request->validate([
                'name' => 'required',
            ],[
                'name.required' => 'Enter category name'
            ]);

            Category::findOrFail($id)->Update([
                'name' => $request->name,
                'updated_at' => Carbon::now(),
            ]);

        }

        $notification=array(
            'message'=>'Category has been updated successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('category.list')->with($notification);
    }
    //Category delete
    public function categoryDelete($id){
        $category = Category::findOrFail($id);
        $img = $category->icon;
        unlink($img);
        Category::findOrFail($id)->delete();
        $notification=array(
            'message'=>'Category has been deleted successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    //Category status inactive
    public function categoryInactive($id)
    {
        Category::findOrFail($id)->update(['status' => 0]);
        $notification=array(
            'message'=>'Category status has been updated to inactive',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
    //Category status active
    public function categoryActive($id)
    {
        Category::findOrFail($id)->update(['status' => 1]);
        $notification=array(
            'message'=>'Category status has been updated to active',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    //Department index
    public function departmentList()
    {
        $departments = Department::all();
        return view('admin.department.index', [
            'departments' => $departments
        ]);
    }
    //Department create
    public function departmentStore(Request $request)
    {
        $image = $request->file('icon');
        $imageName = hexdec(uniqid()).'.'.$image->getClientOriginalName();
        $directory = 'img/department/';
        $image->move($directory, $imageName);
        $imageUrl = $directory.$imageName;

        $request->validate([
            'name' => 'required',
        ]);

        $department = new Department();
        $department->name = $request->name;
        $department->icon = $imageUrl;
        $department->save();

        $notification=array(
            'message'=>'Department has been added successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('department.list')->with($notification);
    }
    //Department update
    public function departmentEdit($id)
    {
        $department = Department::findOrFail($id);
        return view('admin.department.edit',compact('department'));
    }
    public function departmentUpdate(Request $request)
    {
        $id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('icon'))
        {
            $request->validate([
                'name' => 'required',
            ],[
                'name.required' => 'Enter department name'
            ]);

            unlink($old_img);
            $image = $request->file('icon');
            $imageName = hexdec(uniqid()).'.'.$image->getClientOriginalName();
            $directory = 'img/category/';
            $image->move($directory, $imageName);
            $save_url = $directory.$imageName;
            Department::findOrFail($id)->Update([
                'name' => $request->name,
                'icon' => $save_url,
                'updated_at' => Carbon::now(),
            ]);
        }
        else
        {
            $request->validate([
                'name' => 'required',
            ],[
                'name.required' => 'Enter category name'
            ]);

            Department::findOrFail($id)->Update([
                'name' => $request->name,
                'updated_at' => Carbon::now(),
            ]);

        }

        $notification=array(
            'message'=>'Department has been updated successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('department.list')->with($notification);
    }
    //Department delete
    public function departmentDelete($id){
        $department = Department::findOrFail($id);
        $img = $department->icon;
        unlink($img);
        Department::findOrFail($id)->delete();
        $notification=array(
            'message'=>'Department has been deleted successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    //Brand index
    public function brandList()
    {
        $brands = Brand::all();
        return view('admin.brand.index', [
            'brands' => $brands
        ]);
    }
    //Brand create
    public function brandStore(Request $request)
    {
        $image = $request->file('icon');
        $imageName = hexdec(uniqid()).'.'.$image->getClientOriginalName();
        $directory = 'img/brand/';
        $image->move($directory, $imageName);
        $imageUrl = $directory.$imageName;

        $request->validate([
            'name' => 'required',
        ]);

        $brand = new Brand();
        $brand->name = $request->name;
        $brand->icon = $imageUrl;
        $brand->save();

        $notification=array(
            'message'=>'Brand has been added successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('brand.list')->with($notification);
    }
    //Brand update
    public function brandEdit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brand.edit',compact('brand'));
    }
    public function brandUpdate(Request $request)
    {
        $id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('icon'))
        {
            $request->validate([
                'name' => 'required',
            ],[
                'name.required' => 'Enter brand name'
            ]);

            unlink($old_img);
            $image = $request->file('icon');
            $imageName = hexdec(uniqid()).'.'.$image->getClientOriginalName();
            $directory = 'img/brand/';
            $image->move($directory, $imageName);
            $save_url = $directory.$imageName;
            Brand::findOrFail($id)->Update([
                'name' => $request->name,
                'icon' => $save_url,
                'updated_at' => Carbon::now(),
            ]);
        }
        else
        {
            $request->validate([
                'name' => 'required',
            ],[
                'name.required' => 'Enter category name'
            ]);

            Brand::findOrFail($id)->Update([
                'name' => $request->name,
                'updated_at' => Carbon::now(),
            ]);

        }

        $notification=array(
            'message'=>'Brand has been updated successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('brand.list')->with($notification);
    }
    //Brand delete
    public function brandDelete($id){
        $brand = Brand::findOrFail($id);
        $img = $brand->icon;
        unlink($img);
        Brand::findOrFail($id)->delete();
        $notification=array(
            'message'=>'Brand has been deleted successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    //Rate section
    public function rate()
    {
        $rate = Rate::findOrFail(1);
        return view('admin.rate.index', [
            'rate' => $rate
        ]);
    }
    public function updateRate(Request $request)
    {
        $id = $request->id;
        $request->validate([
            'value' => 'required',
        ],[
            'value.required' => 'Enter a value'
        ]);

        Rate::findOrFail($id)->Update([
            'value' => $request->value,
            'updated_at' => Carbon::now(),
        ]);

        $notification=array(
            'message'=>'Rate has been updated successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('admin.rate')->with($notification);
    }

    //Basic information
    public function profile()
    {
        return view('admin.profile.index');
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
        return view('admin.profile.change-password');
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

    public function userList()
    {
        $users = User::where('role_id', 2)->get();
        return view('admin.user.index', [
            'users' => $users
        ]);
    }

}
