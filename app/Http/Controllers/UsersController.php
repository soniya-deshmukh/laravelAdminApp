<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Models\User;
use Illuminate\Http\Request;

use Session;

class UsersController extends Controller
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
        //
       // return 'hello';
        /* $users = Users::orderBy('created_at','desc')->paginate(2);
        return view('users.index')->with('users',$users); */
        $filter = $request->query('filter');

        if (!empty($filter)) {
            $users = Users::sortable()
                ->where('users.name', 'like', '%'.$filter.'%')
                ->paginate(2);
        } else {
            $users = Users::sortable()
                ->paginate(2);
        }
    
        return view('users.index')->with('users', $users)->with('filter', $filter);
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
        //echo auth()->user()->id;die;
        /* $validatedData = $request->validate([
            'name' => 'required',
            'password' => 'required|min:8',
            'email' => 'required|email|unique:users'
        ], [
            'name.required' => 'Name is required',
            'password.required' => 'Password is required'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['created_by'] = auth()->user()->id;
        $user = User::create($validatedData);
        /* if ($validatedData->fails()) {
            return \Redirect::back()->withInput()->withErrors($validatedData);
        }
        else 
        return redirect('users')->with('success','User created successfully.'); */
        Session::put('modal_user', 'modal_user');

        $user = new Users;
		$user->name= $request->input('name');
		$user->email= $request->input('email');
		$user->notes= $request->input('notes');
        $user->is_admin= 0;
        $user['created_by'] = auth()->user()->id;
		$user->password= bcrypt($request->input('password'));
        
      
        $request->validate([
            'name' => 'required',
            'password' => 'required|min:8',
            'email' => 'required|email|unique:users'
        ]);
        $user->save();
        return redirect('users')->with('success','User created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function show(Users $users)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit(Users $user)
    {
        //
        return view('users.edit',compact('user'));
        //return view('users/edit')->with ('user',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //echo $request['name']= $request->get('name');die;
        //echo $request['notes']= $request->input('notes');die;
        $request['name']= $request->get('name');
        $request['email']= $request->get('user_email');
		//$request['notes'] = $request->get('notes');

        $validatedData =$request->validate([
            'name' => 'required',
            'email' => '|required|email|unique:users,email,'.$id,
        ],
        [
            'name.required' => 'Name is required',
            'email.required' => 'email is required'
        ]);
        
        $user =  Users::find($id);
		$user->name= $request->input('name');
        $user->email = $request->input('user_email');
		$user->notes= $request->input('notes');

		$user->updated_at= date("Y-m-d H:i:s");
        
		
		$user->save();
        
        return redirect()->route('users.index')
                        ->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
        //or
        /* $user = user::find($id);
         
		
		$user->delete();
		return redirect('posts')->with('success','user Deleted'); */

    }
}
