<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use App\Models\ServiceType;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UserExport;

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
        $user = User::where('usertype','0')->where('approve','1')->sortable()->latest()->paginate(5);
        $bill = DB::table('service_types')->get();

        return view('user.index',compact('user','bill'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
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
            'active' => 'required',
        
            
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
              $user->approve=1;
              $user->active=$request->active;
             
              $user->save();
     
        return redirect()->route('user.index')->with('success','User added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user = User::where('usertype','0')->where('approve','0')->sortable()->latest()->paginate(5);
        return view('user.approve',compact('user')) ->with('i', (request()->input('page', 1) - 1) * 5);
    
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $service = ServiceType::all();
        $user_services = $user->user_services->pluck('id')->toArray();

        return view('user.edit',compact('user','service','user_services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
         if($request->file('image')){

            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('public/images'), $imageName);
            $user->name = $request->name;
            $user->email = $request->email;
           
            $user['image'] = $imageName;
            $user->gender = $request->gender;
            $user->age = $request->age;
            $user->approve = $request->approve; 
            $user->update();


            $data =$request->service;
            $user->user_services()->sync($data);
            return redirect('user')->with('success','Profile updated successfully.');

        }
        else{

            $user->name = $request->name;
            $user->email = $request->email;
            $user->gender = $request->gender;
            $user->age = $request->age;
            $user->approve = $request->approve; 

            $user->update();
            $data =$request->service;
            $user->user_services()->sync($data);
            return redirect('user')->with('success','user updated successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
    
        return redirect()->route('user.index') ->with('success','User deleted successfully');
    }
    public function get_user_data()
    {
        return Excel::download(new UserExport, 'users.xlsx');
    }

    public function accept($id)
    {
        $res = User::find($id)->update(['approve' => '1']);
        return redirect()->back()->with('success', 'Approved Request Successfully.');

    }

    public function filter(Request $request)
    {
        if (auth()->user()->usertype =='1') {

            $bill = ServiceType::all();
            $filter = $request->filter;
            if (empty($filter)) {
                $works = ServiceType::all();
                $user = User::with('user_services')->where('usertype', '0')->sortable()->paginate(5);
            }

            else
            {
                $user = User::with('user_services')->whereHas('user_services',function($user) use ($filter)
                {  
                $user->where('service_types_id',$filter);
                })->sortable()->paginate(5);
            }

            return view('user.index', compact('user', 'bill'))->with('i', (request()->input('page', 1) - 1) *5);

        }
    }
}