<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $data['title'] = 'Users';
        return view('user.index', $data);
    }

    public function loadData()
    {
        $data['record'] = User::all();
        return view('user.loop', $data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'full_name' => 'required',
            'email'     => 'required|email|unique:users,email',
            'username'  => 'required|unique:users,username',
            'password'  => 'required|same:password2',
            'password2' => 'required|same:password',
            'photo'     => 'image|mimes:jpg,jpeg,png,gif,svg'
        ], [
            'password.same'         => 'Password is not the same as confirmation password.',
            'password.required'     => 'Password cannot be empty',
            'password2.same'        => 'Confirm password is not the same as password',
            'password2.required'    => 'Confirm password cannot be empty'
        ]);
        if($validator->fails()){
            $name = $validator->errors()->first('full_name');
            $username = $validator->errors()->first('username');
            $email = $validator->errors()->first('email');
            $password = $validator->errors()->first('password');
            $password2 = $validator->errors()->first('password2');
            $photo = $validator->errors()->first('photo');
            $status = 0;
            return response()->json(compact('name', 'username', 'email', 'password', 'password2', 'photo', 'status'));
        } else {
            if($request->file('photo') == null){
                $fileName = "default.png";
            } else {

                $fileName = Str::random(40).'.'.$request->file('photo')->extension();
                $request->file('photo')->move(public_path('assets/img/'), $fileName);
            }

            User::create([
                'name'      => htmlentities($request->full_name),
                'username'  => htmlentities($request->username),
                'password'  => Hash::make(htmlentities($request->password)),
                'email'     => htmlentities($request->email),
                'photo'     => htmlentities($fileName),
            ]);
            $status = 1;
            $message = 'Registration was successful.';
            return response()->json(compact('status', 'message'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $id = Crypt::decryptString($id);
        $data['title'] = "Edit User";
        $data['record'] = User::find($id);

        return view('user.edit', $data);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $validator = Validator::make($request->all(), [
            'full_name'     => 'required',
            'username'      => 'required',
            'email'         => 'required|email'  
        ]);
        if($validator->fails()){
            $name = $validator->errors()->first('full_name');
            $username = $validator->errors()->first('username');
            $email = $validator->errors()->first('email');
            $status = 0;
            return response()->json(compact('name', 'username', 'email', 'status'));
        } else {
            User::where('id' ,$id)->update([
                'name'      => htmlentities($request->full_name),
                'username'  => htmlentities($request->username),
                'email'     => htmlentities($request->email)
            ]);
            $status = 1;
            return response()->json(compact('status'));
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
        User::destroy($id);
        return response()->json(['id'=>$id]);
    }
}
