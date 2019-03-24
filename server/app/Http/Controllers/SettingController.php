<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller{

    public function index(Request $request){
        return $this->json(Setting::query()->first());
    }

    public function update(Request $request,$id){
        $item = Setting::query()->first();
        try {
            $input = $request->all();
            // Todo: Validate
            $item->update($input);
            return $this->json($item);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

}