<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDomainRequest;
use App\Models\Tenant;
use Illuminate\Http\Request;

class TenancyRegisterController extends Controller
{

    public function create(){
        return view('domain_create');
    }

    public function store(StoreDomainRequest $request){

        //dd($request->all());
        $tenant = Tenant::create($request->validated());
//        dd($request->all());
        $tenant->createDomain(['domain' => $request->domain]);

        $notification = array([
            'message' => 'Domain Create Successfully!',
            'alert-type' => 'success'
        ]);

        return redirect()->route('dashboard')->with($notification);
    }

    public function test(){
        return view('test');
    }


}
