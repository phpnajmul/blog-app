<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Settings;

class FrontendController extends Controller
{
    public function index(){

        $settings_value = Settings::first();

        //dd($allData->heading);

        return view('frontend.index',compact('settings_value'));
    }




}
