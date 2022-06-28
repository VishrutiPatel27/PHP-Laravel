<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class dummyApiController extends Controller
{
    //
    function getData()
    {
        return ["name"=>"vishruti","Address"=>"Ahemdabad"];
    }

}
