<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;

class DeviceController extends Controller
{
    function list()
    {
        return Device:: all();
    }

    function add(Request $request)
    {
        $device = new Device;
        $device->name=$request->name;
        $result=$device->save();
        if($result)
        {
            return ["Result" => "Data added Successfully"];
        }
        else
        {
            return ["Result" => "Data failed"];
        }
    }
}