<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class WelcomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function index()
    {
        $data = Product::latest()->paginate(3);
        $datanew['newdata'] = " ";
        $data1 = Category::get();

        return view('welcome',compact('data','data1','datanew'))
            ->with('i', (request()->input('page', 1) - 1) * 3);


    }


    public function filterProduct(Request $request)
    {
        $query = Product::query();
        $categories = Category::all();
        if($request->ajax()){
            if(empty($request->category))
            {
                $products = $query->get();
            }
            else
            {
                $products = $query->where(['category_id' => $request->category])->get();
            }

            return response()->json($products);
            }
    }

}