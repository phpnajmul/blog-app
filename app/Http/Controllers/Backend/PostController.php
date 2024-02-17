<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(){
        $data['allData'] = Post::all();
        return view('backend.post.view_post',$data);
    }
    public function create(){
        $data['allCategory'] = Category::all();
        //dd($data['allCategory']);
        return view('backend.post.add_post',$data);
    }

    public function store(Request $request){

        $validated = $request->validate([
            'category_id'  => 'required',
            'image'        => 'required|image|mimes:jpeg,jpg,png,gif',
            'headline'     => 'required|max:50',
            'description'  => 'required|max:50',
            'full_content' => 'required',
        ]);

        $data               = new Post();
        $data->category_id  = $request->category_id;
        $data->headline     = $request->headline;
        $data->description  = $request->description;
        $data->full_content = $request->full_content;
        $data->added_by     = Auth::id();

        if ($request->file('image')){
            $file = $request->file('image');
            $filename = date('Ymd').$file->getClientOriginalName();
            $file->move(public_path('upload/backend/post'),$filename);
            $data['image'] = $filename;
        }

        $data->save();

        $notification = array([
            'message'    => 'News create successfully',
            'alert-type' => 'success',
        ]);
        return redirect()->route('index.post')->with($notification);
    }

    public function edit($id){
        $data['allCategory'] = Category::all();
        $data['editData']    = Post::find($id);
        return view('backend.post.edit_post',$data);
    }

    public function update(Request $request, $id){
        $data = Post::find($id);
        $validated = $request->validate([
            'category_id'  => 'required',
            'image'        => 'required|image|mimes:jpeg,jpg,png,gif',
            'headline'     => 'required|max:50',
            'description'  => 'required|max:50',
            'full_content' => 'required',
        ]);

        $data->category_id  = $request->category_id;
        $data->headline     = $request->headline;
        $data->description  = $request->description;
        $data->full_content = $request->full_content;
        $data->updated_by   = Auth::id();

        if ($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/backend/post/'.$data->image));
            $filename = date('Ymd').$file->getClientOriginalName();
            $file->move(public_path('upload/backend/post'),$filename);
            $data['image'] = $filename;
        }

        $data->save();

        $notification = array([
            'message'    => 'News updated successfully',
            'alert-type' => 'success',
        ]);
        return redirect()->route('index.post')->with($notification);
    }

    public function delete($id){
        $data = Post::find($id);
        @unlink(public_path('upload/backend/post/'.$data->image));
        $data->delete();

        $notification = array([
            'message'    => 'News deleted successfully',
            'alert-type' => 'success',
        ]);
        return redirect()->route('index.post')->with($notification);
    }








}
