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

    public function news_search(Request $request){
        if ($request->has('search') && $request->filled('search')) {
            $search_news = $request->input('search');
            $categorynewsts = Post::where(function($query) use ($search_news) {
                $query->where('title', 'like', '%' . $search_news . '%')
                      ->orWhere('sub_title', 'like', '%' . $search_news . '%')
                      ->orWhere('description', 'like', '%' . $search_news . '%');
            })->where('status', 1)->get();
            if ($categorynewsts->isEmpty()) {
                return view('frontend.404page');
            }
            $page_title = "Search result";
            return view('frontend.search', [
                'page_title' => $page_title,
                'categorynewsts' => $categorynewsts,
            ]);
        } else {
            $page_title = "Search result not found";
            return view('frontend.404page')->with(['page_title' => $page_title]);
        }
    }

}
