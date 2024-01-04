<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;
use Carbon\Carbon;

class DeviceController extends Controller
{
    public function store(Request $r){
        
        $device = new Device();
        $device->device_id = $r->get('device_id');
        $device->date = Carbon::now()->setTimezone('America/Mexico_city');
        $device->temperatura_int = $r->get('temperatura_int');
        $device->temperatura_ext = $r->get('temperatura_ext');
        $device->humedad = $r->get('humedad');
        $device->poblacion_med = $r->get('poblacion_med');
        $device->caja_oc = $r->get('caja_oc');
        $device->save();
       
        return response()->json($device);      
    }

    public function getLast($id){
        return Device::where('device_id',$id)->orderBy('date','desc')->first()->poblacion_med;
    }
}
