<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GalleryController extends Controller
{
    
    Public function index()
    {
        return view('gallery');
    }
}
