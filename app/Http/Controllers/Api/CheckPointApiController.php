<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckPointApiController extends Controller
{
    public function deviceScan(Request $request){
        $data=$request->all();
        info($request->all());
        // return response()->json(['target'=>$data['target']]);
        return response()->json(compact('data'));
    }
}