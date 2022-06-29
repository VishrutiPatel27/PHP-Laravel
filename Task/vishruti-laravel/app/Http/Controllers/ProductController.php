<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
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
    public function index(Request $request)

    {
        $data1 = Category::get();
        if($request->has('trashed'))
        {
            $data = Product::Where('active','yes')->onlyTrashed()->paginate(5);

        }

        else 
        {
                        $data=Product::latest()->paginate(5);

            $data = Product::Where('active','yes')->withoutTrashed()->paginate(5);
        }

        return view('product.index',compact('data','data1'))->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Category::where('active','Yes')->get();
        return view('product.create',compact('data'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data = categories::all();
        $request->validate([

            'name' => 'required',
            'category_id' => 'required',
            'image'=>'required | image |mimes : JPEG,png,jpg|max:20048',
            'user_id' => 'required',
            'active' => 'required',
        ]);

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('public/images'), $imageName);

        $product=$request->all();

        $product['image'] = $imageName;

        Product::create($product);

        return redirect()->route('product.index')->with('success','Product Added successfully.');
   
                
    }

   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {

        $data = Category::get();
        return view('product.edit',compact('product','data'));
    } 

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
      
        if($request->file('image')){

            unlink(public_path('public/images/'.$product->images));

            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('public/images'), $imageName);
            $product->name = $request->name;
            $product->category_id = $request->category;
            $product->active = $request->active;
           
            $product['image'] = $imageName;
            $product->update();
            return redirect('product')->with('success','Product updated successfully.');

        }else{

            $product->name = $request->name;
            $product->category_id = $request->category;
            $product->active = $request->active;
            
            $product->update();
            return redirect('product') ->with('success','Product updated successfully.');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        Product::find($id)->delete();
        return redirect()->route('product.index')->with('success','Product deleted successfully');
    
    }

    public function delete(Request $request,$id)
    {
        Product::onlyTrashed()->find($id)->forceDelete();
        return redirect()->back()->with('success','Product Deleted successfully');
    }


    public function restore(Request $request,$id)
    {
        
        Product::onlyTrashed()->find($id)->restore();
        return redirect()->route('product.index')->with('success','Product Restored successfully');
    }
      
}
