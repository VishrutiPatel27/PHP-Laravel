<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Show;
use App\Exports\MovieExport;
use Maatwebsite\Excel\Facades\Excel;

class MovieController extends Controller
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
        $data = Movie::sortable()->paginate(5);
        // $data = Movie::latest()->paginate(5);
        $datanew['newdata'] = " ";

        return view('movie.index',compact('data','datanew'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('movie.create');
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
            'description' => 'required',
            'simage'=>'required | image |mimes : JPEG,png,jpg|max:20048',
            'bimage'=>'required | image |mimes : JPEG,png,jpg',
            'active' => 'required',
        ]);

        $imageName = time().'.'.$request->simage->extension();
        $imageName1 = time().'.'.$request->bimage->extension();

        $request->simage->move(public_path('public/images'), $imageName);
        $request->bimage->move(public_path('public/image'), $imageName1);

        $movie=$request->all();

        $movie['simage'] = $imageName;
        $movie['bimage'] = $imageName1;
        Movie::create($movie);

        return redirect()->route('movie.index')->with('success','Movie Added successfully.');
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
    public function edit(Movie $movie)
    {
        $data = Movie::get();
        return view('movie.edit',compact('movie','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        if($request->file('image')){

            unlink(public_path('public/images/'.$movie->images));

            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('public/images'), $imageName);
            $movie->name = $request->name;
            $movie->description = $request->description;
            $movie->active = $request->active;
            $movie['simage'] = $imageName;
            $movie['bimage'] = $imageName;
            $movie->update();
            return redirect('movie')->with('success','movie updated successfully.');

        }
        else{

            $movie->name = $request->name;
            $movie->description = $request->description;
            $movie->active = $request->active;
            
            $movie->update();
            return redirect('movie')->with('success','movie updated successfully.');

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
        Movie::find($id)->delete();
        return redirect()->route('movie.index')->with('success','Movie deleted successfully');
    }
    public function get_movie_data()
    {
        return Excel::download(new MovieExport, 'Movies.xlsx');
    }
}
