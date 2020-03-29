<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use Illuminate\Support\Facades\Route;
use laravel\Passport\Client;

class UserController extends Controller
{
    public function register(Request $request){
        $user = new Users();
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->address = $request->input('address');
        $user->gender = $request->input('gender');
            $user->save();
            $response["Users"] = $user;
            $response["success"] = "1";
            $user_data = array(
               $response
            );
        return response()->json($user_data);
    }

    public function read()
    {
        $stu = Users::all();
        return response()->json($stu); 
    }

    public function showbyid($email)
    {
        $stu = Users::where('email',$email)->get();
        return response()->json($stu);
    }
    

    public function login($email , $password)
    {

        $request = Users::where(function($q) use ($email,$password)
        {
            $q->where('email','=',$email);
            $q->where('password','=',$password);
        })->get();

        if($request->count()){
            $response["Users"] = $request;
            $response["success"] = "1";
            $form_data = array(
                $response
            );
        }
        else {
            $response["Users"] = "null";
            $response["success"] = "0";
        }
      return response()->json($response);  
    }

    public function update($username,Request $request)
    {
        $stmt = Users::where('username',$username)->get();
        $stmt->username = $request->input('username');
        $stmt->email = $request->input('email');
        $stmt->address = $request->input('address');
        $stmt->save();
        $response["Users"] = $stmt;
        $response["success"] = "1";

        $user_data = array(
            $response
        );

        return response()->json($user_data);
    }

    public function delete($id)
    {
        $data = Users::find($id);
        if ( $data == $id){
            $response["success"] = "0";
        }else {
            $data->delete();
            $response["Users"] = "null";
            $response["success"] = "1";
        }
        return response()->json($response);
        $data->save();
    }

}
