<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AboutController extends Controller
{
    public function index(){
        $data['allData'] = About::all();
        $data['count_about'] = About::count();

        if ($data['count_about'] > 0){
            $data['get_status'] = About::first()->status;
        }

        return view('backend.about.view_about',$data);
    }

    public function create(){
        $data['count_about'] = About::count();
        return view('backend.about.add_about',$data);
    }

    public function store(Request $request){

        //dd($request->all());

        $validated = $request->validate([
            'map_title' => 'required|max:255',
            'address'   => 'required|max:255',
            'map_url'   => 'required'
        ]);

        $data = new About();

        $data->map_title = $request->map_title;
        $data->address = $request->address;
        $data->map_url = $request->map_url;
        $data->added_by = Auth::id();
        $data->save();

        $notification = array([
            'message' => 'Thanks! About create successfully!',
            'alert-type' => 'success'
        ]);

        return redirect()->route('index')->with($notification);

    }

    public function inactive(Request $request){

        $value = $request->inactive_value;
        $id = $request->id;

        $data = About::find($id);
        $data->status = $value;
        $data->save();

        return redirect()->back()->with('success', 'Yah! Your about is inactive');
    }

    public function active(Request $request){

        $value = $request->active_value;
        $id = $request->id;

        $data = About::find($id);
        $data->status = $value;
        $data->save();

        return redirect()->back()->with('success', 'Yah! Your about is active');
    }






}
