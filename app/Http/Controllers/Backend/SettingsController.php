<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function allSettings(){

        $data['settings_count'] = Settings::count();
//        dd($settings_count);

        return view('backend.settings.settings',$data);
    }

    public function storeAllSettings(Request $request){

        $request->validate([
            'logo'              => 'required',
            'footer_logo'       => 'required',
            'image'             => 'required',
            'heading'           => 'max:35',
            'title'             => 'max:20',
            'cholak'            => 'max:50',
            'footer_logo_title' => 'max:20',
        ]);

        $data = new Settings();
        $data->heading = $request->heading;
        $data->title = $request->title;
        $data->cholak = $request->cholak;
        $data->footer_logo_title = $request->footer_logo_title;
        $data->facebook = $request->facebook;
        $data->twitter = $request->twitter;
        $data->github = $request->github;
        $data->dribble = $request->dribble;

        //logo upload here
        if ($request->file('logo')) {
            $file = $request->file('logo');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/backend/settings'),$filename);
            $data['logo'] = $filename;
        }

        //footer logo upload here
        if ($request->file('footer_logo')) {
            $file = $request->file('footer_logo');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/backend/settings'),$filename);
            $data['footer_logo'] = $filename;
        }

        //display image upload here
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/backend/settings'),$filename);
            $data['image'] = $filename;
        }

        $data->added_by = Auth::id();
        $data->save();

        $notification = array(
            'message'    => 'Your website settings successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }

    public function editAllSettings(){
        $data['editData'] = Settings::first();
        $data['settings_count'] = Settings::count();
        return view('backend.settings.edit_settings',$data);
    }

    public function updateAllSettings(Request $request, $id){

        $data = Settings::find($id);

        $request->validate([
            'heading'           => 'max:35',
            'title'             => 'max:20',
            'cholak'            => 'max:50',
            'footer_logo_title' => 'max:20',
        ]);

        $data->heading = $request->heading;
        $data->title = $request->title;
        $data->cholak = $request->cholak;
        $data->footer_logo_title = $request->footer_logo_title;
        $data->facebook = $request->facebook;
        $data->twitter = $request->twitter;
        $data->github = $request->github;
        $data->dribble = $request->dribble;

        //logo upload here
        if ($request->file('logo')) {
            $file = $request->file('logo');
            @unlink(public_path('upload/backend/settings/'.$data->logo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/backend/settings'),$filename);
            $data['logo'] = $filename;
        }

        //footer logo upload here
        if ($request->file('footer_logo')) {
            $file = $request->file('footer_logo');
            @unlink(public_path('upload/backend/settings/'.$data->footer_logo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/backend/settings'),$filename);
            $data['footer_logo'] = $filename;
        }

        //display image upload here
        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/backend/settings/'.$data->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/backend/settings'),$filename);
            $data['image'] = $filename;
        }

        $data->updated_by = Auth::id();
        $data->save();

        $notification = array(
            'message'    => 'Your website settings updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }














}
