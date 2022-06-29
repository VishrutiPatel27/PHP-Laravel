<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    
    Public function index()
    {
        return view('contact');
    }
}
