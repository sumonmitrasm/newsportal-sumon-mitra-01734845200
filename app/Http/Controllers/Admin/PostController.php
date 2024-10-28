<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Issue;
use Image;
use Illuminate\Support\Facades\Mail;
class PostController extends Controller
{
   public function post(){
    $posts = Post::limit(200)->orderBy('id', 'desc')->get();
    $title = "All Post";
    return view('admin.post.post')->with(compact('posts','title'));
   }

   public function updatePostStatus(Request $request)
{
    if ($request->ajax()) {
        $data = $request->all();
        if ($data['status'] == "Active") {
            $status = 0;  
        } else {
            $status = 1;  
        }
        Post::where('id', $data['value_id'])->update(['status' => $status]);
        return response()->json(['status' => $status, 'value_id' => $data['value_id']]);
    }
}

    public function deletePost($id){
        $posts = Post::select('image')->where('id',$id)->first();
        $posts_image_path = 'admin/admin_images/post/large/';
        if (file_exists($posts_image_path.$posts->image)) {
            unlink($posts_image_path.$posts->image);
        }
        Post::where('id',$id)->delete();
        return redirect()->back();
    }
    
   public function addEditPost(Request $request, $id=null){
    if ($id=="") {
        $title = "Add New News";
        $post = new Post;
        $message = "News added successfully successfully";
    }else{
        $title = "Update News";
        $post = Post::find($id);
        $message = "Update News Details successfully";
    }
    if($request->isMethod('post'))
        {
            $data = $request->all();
            if ($request->hasFile('image')) {
                $image_tmp = $request->file('image');
                if ($image_tmp->isValid()) {
                    if ($post->image && File::exists(public_path('admin/admin_images/post/large/' . $post->image))) {
                        File::delete(public_path('admin/admin_images/post/large/' . $post->image));
                    }
                    $extension = $image_tmp->getClientOriginalExtension();
                    $imageName = rand(111, 99999) . '.' . $extension;
                    $medium_image_path = 'admin/admin_images/post/large/' . $imageName;
                    Image::make($image_tmp)->resize(500,500)->save($medium_image_path);
                    $post->image = $imageName;
                }
            }
            $post->title = $data['title'];
            $post->sub_title = $data['sub_title'];
            $post->description = $data['description'];
            if ($id=="") {
                $post->status = 0;
            }
            $post->save();
            session()->flash('success_message', $message);
            return redirect('admin/post');
        }
    return view('admin.post.add_edit_post')->with(['title'=>$title,'post'=>$post]);
   }


}
