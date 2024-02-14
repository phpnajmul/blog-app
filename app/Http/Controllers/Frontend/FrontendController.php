<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Service;
use App\Models\Settings;

class FrontendController extends Controller
{
    public function index(){

        $data['countSetting']   = Settings::count();
        $data['settings_value'] = Settings::first();

        $data['count_about'] = About::where('status',1)->count();
        $data['get_about']   = About::first();

        $data['allData'] = Service::all();

        return view('frontend.index',$data);
    }





}
