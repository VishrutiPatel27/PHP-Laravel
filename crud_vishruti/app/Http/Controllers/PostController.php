<?php

namespace App\Http\Controllers;

use App\Models\Post; 
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Post::latest()->paginate(3);
        $datanew['newdata'] = " ";

        return view('posts.index',compact('data','datanew'))
            ->with('i', (request()->input('page', 1) - 1) * 3);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
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
            'fname' => 'required|min:2|max:10|unique:posts',
            'lname' => 'required|min:2|max:10',
            'email' => 'required|email',
            'gender' => 'required',
            'designation' => 'required',
            'description' => 'required|max:50',
        ],[
                'fname.required' => 'first name is required',
                'fname.unique' => 'First name is already exists!!',
                'lname.required' => 'last name is required',
                'fname.min' => 'Minimum 1 charachers require!!',
                'fname.max' => 'Minimum 10 charachers require!!',
                'lname.min' => 'Minimum 1 charachers require!!',
                'lname.max' => 'Minimum 10 charachers require!!',
                'gender'=>'Gender is required',
                'designation' => 'Designation is require!!',
                'email.required' => 'Email is required'
                
            ]);
    
        Post::create($request->all());
     
        return redirect()->route('posts.index')
                        ->with('success','Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //echo $post->id; exit;
        $request->validate([
            'fname' => 'required|min:2|max:10',
            'lname' => 'required|min:2|max:10',
            'email' => 'required|unique:posts,email,'.$post->id.',id',
            'gender' => 'required',
            'designation' => 'required',
            'description' => 'required|max:50',
        ],[
                'fname.required' => 'first name is required',
                'lname.required' => 'last name is required',
                'fname.min' => 'Minimum 1 charachers require!!',
                'fname.max' => 'Minimum 10 charachers require!!',
                'fname.unique' => 'First name is already exists!!',
                'lname.min' => 'Minimum 1 charachers require!!',
                'lname.max' => 'Minimum 10 charachers require!!',
                'gender'=>'Gender is required',
                'designation' => 'Designation is required',
                'email.required' => 'Email is required'
                
            ]);

        
        // $request_data = $request->all();
        // $request_data['gender'] = 'active'; 
        $request_data = $request->all();
        $post->update($request_data);
        return redirect()->route('posts.index')
                        ->with('success','Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
    
        return redirect()->route('posts.index')
                        ->with('success','Post deleted successfully');
    }
}
