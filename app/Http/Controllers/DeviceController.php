<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;

class DeviceController extends Controller
{
    public function store(Request $r){
        
        $device = Device::create($r->all());
       
        return response()->json($device);      
    }
}
