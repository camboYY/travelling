<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
class AuthController extends Controller
{
    /**
    * login api 
    * @return \Illuminate\Http\Response 
    */
    public function login() { 
        if( Auth::attempt(['phone_number' => Request('phone_number'), 'password' => Request('password')])) { 
            $user = Auth::user(); 
            $success['token'] = $user->createToken('myApp')->accessToken; 
            return response()->json(['success' => $success], 200); 
        } else { 
            return response()->json(['error' => 'Unauthorised'], 401); 
        } 
    }

/** Register api 
* @return \Illuminate\Http\Response 
*/ 
    public function register(Request $request) { 
        $validator = Validator::make(
            $request->all(), [ 'name' => 'required', 
                                'email' => 'nullable|email', 
                                'phone_number' => 'required|numeric',
                                'password' => 'required|alpha_num', 
                                'confirm_password' => 'required|same:password', 
                            ]); 
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401); 
        }

        $input = $request->all(); 
        $input['password'] = bcrypt($input['password']); 
        $user = User::create($input); 
        $success['token'] = $user->createToken('myApp')->accessToken; 
        $success['name'] = $user->name; 
        return response()->json(['success'=>$success], 200); 
    } 
}

