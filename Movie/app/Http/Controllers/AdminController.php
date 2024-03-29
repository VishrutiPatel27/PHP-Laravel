<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use App\Models\Admin;
use App\Exports\AdminExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
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
        
        $data = User::where('usertype','0')->latest()->paginate(3);
        $datanew['newdata'] = " ";

        return view('admin.index',compact('data','datanew'))
            ->with('i', (request()->input('page', 1) - 1) * 3);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
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
            'name' => 'required|min:2',
            'email' => 'required|email',
            'password' => 'required',
        
            
        ],[
                'name.required' => 'Name is required',
                'name.unique' => 'Name is already exists!!',
                'name.min' => 'Minimum 1 charachers require!!',
                'name.max' => 'Minimum 10 charachers require!!',
                'email.required' => 'Email is required',                
                'password.required' => 'Password is required',
                  
                
            ]);
              $user = new User;
              $user->name=$request->name;
              $user->email=$request->email;
              $user->password= Hash::make($request->password);
              $user->save();
     
        return redirect()->route('admin.index')->with('success','User added successfully.');
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
    public function edit(User $admin)
    {
        return view('admin.edit',['user' => $admin]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $admin)
    {
        {
            echo $admin->id;
            $request->validate([

                'name' => 'required|min:3',
            ],[
                    'name.required' => 'name is required',
                    'email.required' => 'Email is required',
                ]);
            $request_data = $request->all();
            $admin->update($request_data);
            return redirect()->route('admin.index')
                            ->with('success','user updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $admin)
    {
        $admin->delete();
    
        return redirect()->route('admin.index') ->with('success','Admin deleted successfully');
    }
    public function get_admin_data()
    {
        return Excel::download(new AdminExport, 'users.xlsx');
    }
}
