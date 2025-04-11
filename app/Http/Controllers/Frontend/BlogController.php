<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\BlogService;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function __construct(
        protected BlogService $blogService
    ) {
       
    }
    public function index(){
        $blogs = $this->blogService->getAllBlog();
        return view('frontend.blogs.index',compact('blogs'));
    }

    public function detail(Request $request){
        $blog = $this->blogService->getBlogByAlias($request->alias);
        return view('frontend.blogs.detail',compact('blog'));
    }
}
