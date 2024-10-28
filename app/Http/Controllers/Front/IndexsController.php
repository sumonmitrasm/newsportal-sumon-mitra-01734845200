<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Issue;
use Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
class IndexsController extends Controller
{
    public function index(){
        $post = Post::where('status',1)->orderBy('id', 'desc')->paginate(15);
        $postcount = Post::get()->count();
        return view('frontend.dashboard')->with(compact('post','postcount'));
    }

}
