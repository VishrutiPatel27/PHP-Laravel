<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Category::latest()->paginate(3);
        $datanew['newdata'] = " ";

        return view('category.index',compact('data','datanew'))
            ->with('i', (request()->input('page', 1) - 1) * 3);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'cname' => 'required',
            //'active' => 'required',
           
            
        ],[
                'cname.required' => 'category is required',
                //'active.required' => 'Select any one',
                
                
            ]);
                $category=$request->all();
       
            Category::create($category);
     
        return redirect()->route('category.index')
                        ->with('success','Category Added successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @param \app\models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param \app\models\Category $category
     ** @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'cname' => 'required',
            'active' => 'required',
           
           
        ],[
                'cname.required' => 'category is required',
                'active.requird' => 'Selecte any one',
                                  
            ]);
            //$admin->Update($request->all());
        //$category = $request->all();
        $category->update($request->all());
        return redirect()->route('category.index')
                        ->with('success','Category updated successfully');
    }

    public function show()
    {
       // return view ('category.index');
    }    

    /**
     * Remove the specified resource from storage.
     * @param \app\models\Category $category
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * 
     */
    public function destroy(Category $category)
    {
        $category->delete();
    
        return redirect()->route('category.index')
                        ->with('success','Category deleted successfully');
    }
}