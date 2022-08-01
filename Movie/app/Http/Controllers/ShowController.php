<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Show;

class ShowController extends Controller
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
    public function index(Movie $movie)
    {
       //$data = Movie::get();
        // die($data);
        // $data = Show::Where('active','active')->paginate(5);        
       $data = Show::select('shows.*','movies.name as moviename')->join('movies','movies.id','=', 'movie_id')->get(); 
        $moviename = Movie::where('active','active')->get('name');
        return view('show.index',compact('data','moviename'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Movie::where('active','=','active')->get();
        return view('show.create',compact('data'));
    }



    public function show($id)
    {
            $data = Show::where('movie_id','=', $id)->get();
            return view ('show.index',compact('data'))->with('i');
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

            'name' => 'required',
            'date' => 'required',
            'time' => 'required',
            'location' => 'required',
            // 'movie' => 'required',
            'active' => 'required',
        ]);

       
        $show=$request->all();
        
        Show::create($show);

        return redirect()->route('show.index')->with('success','Show Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Show $show)
    {
        $data = Movie::where('active','active')->get();
        return view('show.edit',compact('show','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Show $show)
    {
        $request->validate([
            'name' => 'required',
            'date' => 'required',
            'time' => 'required',
            'location' => 'required',
            'movie_id' => 'required',
            'active' => 'required',
        ],);
    
        $request_data = $request->all();
        $show->update($request_data);
        return redirect()->route('show.index')
                        ->with('success','show updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Show::find($id)->delete();
        return redirect()->route('show.index')->with('success','Show deleted successfully');
    }
}