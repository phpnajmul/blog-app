<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index(){
        $data['count_category'] = Category::count();
        $data['allData'] = Category::all();
        return view('backend.category.view_category',$data);
    }

    public function create(){
        $data['count_category'] = Category::count();
        return view('backend.category.add_category',$data);
    }

    public function store(Request $request){

        $count_category = Category::count();

        if ($count_category == 6){
            $notification = array([
                'message'    => 'Ops! You already added 6 categories, you can not create more than',
                'alert-type' => 'error'
            ]);

            return redirect()->route('index.category')->with($notification);
        }

        $validated = $request->validate([
            'logo'          => 'required|image|mimes:jpeg,jpg,png,gif',
            'category_name' => 'required|max:20|unique:categories',
            'description'   => 'required|max:30',
        ]);

        $data = new Category();
        $data->category_name = $request->category_name;
        $data->description   = $request->description;
        $data->added_by      = Auth::id();

        if ($request->file('logo')){
            $file = $request->file('logo');
            $filename = date('Ymd').$file->getClientOriginalName();
            $file->move(public_path('upload/backend/category'),$filename);
            $data['logo'] = $filename;
        }

        $data->save();

        $notification = array([
            'message'    => 'Thanks! Your category create successfully.',
            'alert-type' => 'success'
        ]);

        return redirect()->route('index.category')->with($notification);
    }

    public function edit($id){
        $data['editData'] = Category::find($id);
        return view('backend.category.edit_category',$data);
    }


    public function update(Request $request, $id){
        $data = Category::find($id);
        $validated = $request->validate([
            'logo'          => 'nullable|image|mimes:jpeg,jpg,png,gif',
            'category_name' => 'required|max:20|unique:categories,category_name,'.$data->id,
            'description'   => 'required|max:30',
        ]);

        $data->category_name = $request->category_name;
        $data->description   = $request->description;
        $data->updated_by    = Auth::id();

        if ($request->file('logo')){
            $file = $request->file('logo');
            @unlink(public_path('upload/backend/category/'.$data->logo));
            $filename = date('Ymd').$file->getClientOriginalName();
            $file->move(public_path('upload/backend/category'),$filename);
            $data['logo'] = $filename;
        }

        $data->save();

        $notification = array([
            'message' => 'Thanks! Your category updated successfully.',
            'alert-type' => 'success'
        ]);

        return redirect()->route('index.category')->with($notification);

    }


    public function delete($id){

        $post_filter = Post::where('category_id',$id)->first();

        if ($post_filter != null){
            return "Ops! This category used! You can not delete this!";
        }

        $data = Category::find($id);

       if ($data->logo != null){
           @unlink(public_path('upload/backend/category/'.$data->logo));
       }
        $data->delete();

        $notification = array([
            'message' => 'Thanks! Your category deleted successfully.',
            'alert-type' => 'success'
        ]);

        return redirect()->route('index.category')->with($notification);

    }








}
