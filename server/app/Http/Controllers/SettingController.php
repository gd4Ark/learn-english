<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller{

    public function index(Request $request){
        return Setting::all()->first();
    }

    public function update(Request $request,$id){
        $data = Setting::all()->first();
        $data->update($request->all());
    }

}