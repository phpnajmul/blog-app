<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Category;
use App\Models\Post;
use App\Models\Settings;

class FrontendController extends Controller
{
    public function index(){
        $data['countSetting']   = Settings::count();
        $data['settings_value'] = Settings::first();
        $data['count_about']    = About::where('status',1)->count();
        $data['get_about']      = About::first();
        $data['allData']        = Category::all();
        return view('frontend.index',$data);
    }

    public function catWisePostView($id){
        $data['countSetting']   = Settings::count();
        $data['settings_value'] = Settings::first();
        $data['allData']        = Category::all();
        $data['cat_wise_post']  = Post::where('category_id',$id)->get();
        return view('frontend.cate_wise_post.cate_wise_post',$data);
    }

    public function PostViewDetails($id){
        $data['countSetting']      = Settings::count();
        $data['settings_value']    = Settings::first();
        $data['view_post_details'] = Post::find($id);
        return view('frontend.cate_wise_post.post_view_details',$data);
    }






}
