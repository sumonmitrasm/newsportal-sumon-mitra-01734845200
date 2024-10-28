<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
Use App\Models\Admin;
Use App\Models\Post;
Use App\Models\User;
use Image;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class AdminController extends Controller
{
    public function dashboard(){
        $post = Post::get()->count();
        $admin = Admin::get()->count();
        $coustomer = User::get()->count();
        return view('admin.dashboard')->with(['post'=>$post,'admin'=>$admin,'coustomer'=>$coustomer]);
    }
    public function admins(){
        $title  = "Admin Details";
        $admins = Admin::get();
        return view('admin.admins_details.admin')->with(['admins'=>$admins,'title'=>$title ]);
    }
    public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $rules =[
                'email' => 'required|email|max:255',
                'password' => 'required',
            ];

            $customMessages = [
                'email.required' => 'Email is required!',
                'email.email' => 'Valid Email is required!',
                'password.required' => 'Password is required!',
            ];
            $this->validate($request,$rules,$customMessages);
            if (Auth::guard('admin')->attempt(['email'=>$data['email'],'password'=>$data['password'],'status'=>1])) {
                return redirect('admin/dashboard');
             }else{
                return redirect()->back()->with('error_message','Invalid Password or Email!');
             }
        }
        return view('admin.login');
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }
    public function addEditAdmin(Request $request, $id=null)
    {
        if ($id=="") {
            $title = "Add New Staff";
            $admin = new Admin;
            $message = "Staff added successfully";
        }else{
            $title = "Edit Staff";
            $admin = Admin::find($id);
            $message = "Staff role updated successfully";
        }
        if($request->isMethod('post')){
            $data = $request->all();
            if ($id=="") {
                $adminCount = Admin::where('email',$data['email'])->count();
                if ($adminCount>0) {
                    Session::flash('error_message','Admin-subadmin already exist');
                    return redirect()->back();
                }
            }
            $rules = [
                'name' => 'required',
                'mobile' => 'required',
                'type' => 'required',
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                ];

                $customMessages = [
                'name.required' => 'Name is required',
                'name.regex'=>'valid Name is required',
                'mobile.required'=>'Mobile number is required',
                'image.image'=>'Valid image is required',
                ];
                $this->validate($request,$rules,$customMessages);
            if ($request->hasFile('image')) {
                $image_tmp = $request->file('image');
                if ($image_tmp->isValid()) {
                 $image_name = $image_tmp->getClientOriginalName();
                 $extension = $image_tmp->getClientOriginalExtension();
                 $imageName = $image_name.'-'.rand(111, 99999).'.'.$extension;
                 $large_image_path = 'admin/admin_images/large/'.$imageName;
                 $small_image_path= 'admin/admin_images/large/'.$imageName;
                 Image::make($image_tmp)->resize(250,250)->save($large_image_path);
                 Image::make($image_tmp)->resize(90,90)->save($small_image_path);
                }
             }else if(!empty($data['current_admin_image'])){
                $imageName = $data['current_admin_image'];
             }else{
                 $imageName = "";
             }
             $admin->image = $imageName;
             $admin->name = $data['name'];
            $admin->mobile = $data['mobile'];
            if ($data['password']!="") {
                $admin->password = bcrypt($data['password']);
            }
            $admin->type = $data['type'];
            if ($id=="") {
                $admin->email = $data['email'];
            }
            $admin->description = $data['description'];
            $admin->status = 1;
            $admin->save();
            session::flash('success_message',$message);
            return redirect()->route('admin.details');
        }
        return view('admin.admins_details.add_edit_admin')->with(compact('title','admin'));
    }
    public function updateAdminStatus(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            if ($data['status'] == "Active") {
                $status = 0;  
            } else {
                $status = 1;  
            }
            Admin::where('id', $data['value_id'])->update(['status' => $status]);
            return response()->json(['status' => $status, 'value_id' => $data['value_id']]);
        }
    }
    public function deleteUser($id){
        $posts = Admin::select('image')->where('id',$id)->first();
        $posts_image_path = 'admin/admin_images/large/';
        if (file_exists($posts_image_path.$posts->image)) {
            unlink($posts_image_path.$posts->image);
        }
        Admin::where('id',$id)->delete();
        return redirect()->back();
    }
}
