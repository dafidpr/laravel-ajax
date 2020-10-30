<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\User;

class AuthController extends Controller
{
    public function login(){
        if(session('users')){
            return redirect()->back();
        }
        $data['title'] = 'Login';
        return view('login', $data);
    }

    public function postLogin(Request $request){
        $validator = Validator::make($request->all(), [
            'username'  => 'required',
            'password'  => 'required'
        ]);

        if($validator->fails()){
            $username = $validator->errors()->first('username');
            $password = $validator->errors()->first('password');
            $status = 0;
            return response()->json(compact('username', 'password', 'status'));
        } else {
            $user = User::where('username', $request->username)->first();
            if($user){
                if(Hash::check($request->password, $user->password)){

                    $user->last_login = Carbon::now();
                    $user->save();
                    
                    $request->session()->put('users', [
                        'username' => $user->username,
                    ]);
                    return response()->json(['status' => 1, 'data' => 'Success']);
                } else {
                    return response()->json(['status' => 2, 'data' => 'Wrong password!']);
                }
            } else {
                return response()->json(['status' => 3, 'data' => 'Username is not registered!']);
            }
        }
    }

    public function logout(){
        session()->flush();
        return redirect('/');
    }
}
