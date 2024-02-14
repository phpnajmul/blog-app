<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function index(){
        $data['count_service'] = Service::count();
        $data['allData'] = Service::all();
        return view('backend.service.view_service',$data);
    }

    public function create(){
        $data['count_service'] = Service::count();
        return view('backend.service.add_service',$data);
    }

    public function store(Request $request){

        $count_service = Service::count();

        if ($count_service == 6){
            $notification = array([
                'message'    => 'Ops! You already added 6 services, you can not create more than',
                'alert-type' => 'error'
            ]);

            return redirect()->back()->with($notification);
        }

        $validated = $request->validate([
            'logo'        => 'required|image|mimes:jpeg,jpg,png,gif',
            'headline'    => 'required|max:20',
            'description' => 'required|max:30',
        ]);

        $data = new Service();
        $data->headline    = $request->headline;
        $data->description = $request->description;
        $data->added_by    = Auth::id();

        if ($request->file('logo')){
            $file = $request->file('logo');
            $filename = date('Ymd').$file->getClientOriginalName();
            $file->move(public_path('upload/backend/service'),$filename);
            $data['logo'] = $filename;
        }

        $data->save();

        $notification = array([
            'message' => 'Thanks! Your service create successfully.',
            'alert-type' => 'success'
        ]);

        return redirect()->back()->with($notification);
    }

    public function edit($id){
        $data['editData'] = Service::find($id);
        return view('backend.service.edit_service',$data);
    }


    public function update(Request $request, $id){
        $data = Service::find($id);
        $validated = $request->validate([
            'logo'        => 'nullable|image|mimes:jpeg,jpg,png,gif',
            'headline'    => 'required|max:20',
            'description' => 'required|max:30',
        ]);

        $data->headline    = $request->headline;
        $data->description = $request->description;
        $data->updated_by    = Auth::id();

        if ($request->file('logo')){
            $file = $request->file('logo');
            @unlink(public_path('upload/backend/service/'.$data->logo));
            $filename = date('Ymd').$file->getClientOriginalName();
            $file->move(public_path('upload/backend/service'),$filename);
            $data['logo'] = $filename;
        }

        $data->save();

        $notification = array([
            'message' => 'Thanks! Your service updated successfully.',
            'alert-type' => 'success'
        ]);

        return redirect()->route('index.service')->with($notification);

    }


    public function delete($id){

        $data = Service::find($id);
        @unlink(public_path('upload/backend/service/'.$data->logo));
        $data->delete();

        $notification = array([
            'message' => 'Thanks! Your service deleted successfully.',
            'alert-type' => 'success'
        ]);

        return redirect()->route('index.service')->with($notification);

    }








}
