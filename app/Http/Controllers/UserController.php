<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Validator;
use Former;
use App\Department;
use App\Mail\Passwordmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Session;

class UserController extends Controller
{
    //use Auth;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //public $password;
    public function index()
    {

        $user=User::all();
        return view('Admin.User.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*$department = new Department;
        dd($department);
        exit;*/
        return view('Admin.User.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function random_str($length, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
    {
        $pieces = [];
        $max = mb_strlen($keyspace, '8bit') - 1;
        for ($i = 0; $i < $length; ++$i) {
            $pieces []= $keyspace[random_int(0, $max)];
        }
        return implode('', $pieces);
    }

    public function store(Request $request)
    {
        $rules=[
            'department_id' => 'required',
            'name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'role' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'address' => 'required',
        ];
        $messages=[
        'name.required' => 'The name field is required',
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        if ($validator->fails()) { 
            Former::withErrors($validator);
            return redirect()->back()->withErrors($validator)->withInput();
        }

            $password=UserController::random_str(8, 'abcdefghijklmnopqrstuvwxyz');
            $user=New user;
            $user->password=Hash::make($password);
            $user->department_id=$request->get('department_id');
            $user->name=$request->get('name');
            $user->last_name=$request->get('last_name');
            $user->email=$request->get('email');
            $user->role=$request->get('role');
            $user->gender=$request->get('gender');
            $user->dob=$request->get('dob');
            $user->address=$request->get('address');
            $user->save();
            Mail::to($user->email)->send(new Passwordmail($password));
            return redirect()->route('user.index')->withSuccess('Insert record successfully.');
        try
        {
        }
        catch(\Exception $e)
        {
            return redirect()->route('user.index')->withError('Something went wrong, Please try after sometime.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = user::find($id);
        return view('Admin.User.profile',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=user::find($id);
        return view('Admin.User.edit',compact('user'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules=[
            'department_id' => 'required',
            'name' => 'required',
            'last_name' => 'required',
            //'email' => 'required|email|unique:users',
            'role' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'address' => 'required',
        ];
        $messages=[
        'name.required' => 'The name field is required',
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        if ($validator->fails()) { 
            Former::withErrors($validator);
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try
        {
            /*$user=New user;
            $user->name=$request->get('name');
            $department->save();*/
            $user=user::find($id);
            $user->department_id=$request->get('department_id');
            $user->name=$request->get('name');
            $user->last_name=$request->get('last_name');
            //$user->email=$request->get('email');
            $user->role=$request->get('role');
            $user->gender=$request->get('gender');
            $user->dob=$request->get('dob');
            $user->address=$request->get('address');
            $user->update();
            return redirect()->route('user.index')->withSuccess('Insert record successfully.');
        }
        catch(\Exception $e)
        {
            return redirect()->route('user.index')->withError('Something went wrong, Please try after sometime.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = user::find($id);
        $user->delete();
        return redirect()->route('user.index')->withSuccess('Deleted successfully');
    }

    public function logout(Request $request)
    {
        Auth::logout(); 
        return redirect('/login');
    }
}
