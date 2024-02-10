<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }


    public function allSettings(){
        return view('backend.settings.settings');
    }








}
