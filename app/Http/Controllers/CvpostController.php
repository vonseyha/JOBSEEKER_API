<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PostCvModel;
use Illuminate\Support\Facades\Route;
use laravel\Passport\Client;

class CvpostController extends Controller
{
    public function store(Request $request){
        // $new_icon = "circle_profilef";
        // if($request->Icon != null){
        //     $Icon = $request->file('Icon');
        //     $new_icon = time() . '.' . $Icon->
        //        getClientOriginalExtension();
        //     $Icon->move(public_path('icons'),$new_icon);
        // }

        $stmt = new PostCvModel();
        $stmt->Fullname = $request->input('Fullname');
        $stmt->Email = $request->input('Email');
        $stmt->Address = $request->input('Address');
        $stmt->Interest = $request->input('Interest');
        $stmt->Experience = $request->input('Experience');
        $stmt->Language = $request->input('Language');
        $stmt->Lastdate = $request->input('Lastdate');
        $stmt->Demo_File = $request->input('Demo_File');
        $stmt->Icon = $request->input('Icon');
        $stmt->save();
        $response["CV POST"] = $stmt;
        $response["success"] = "1";
        $postjob_data = array(
            $response
        );
        return response()->json($postjob_data);
    }

    public  function read(){
        $stu = PostCvModel::all();
        return response()->json($stu); 
    }

    public function showbyid($Fullname){
        $stu = PostCvModel::where('Fullname',$Fullname)->get();
        return response()->json($stu);
    }

    public function update($id,Request $request){
        $stmt = PostCvModel::find($id);
        $stmt->Fullname = $request->input('Fullname');
        $stmt->Email = $request->input('Email');
        $stmt->Address = $request->input('Address');
        $stmt->Interest = $request->input('Interest');
        $stmt->Experience = $request->input('Experience');
        $stmt->Language = $request->input('Language');
        $stmt->Lastdate = $request->input('Lastdate');
        $stmt->Demo_File = $request->input('Demo_File');
        $stmt->Icon = $request->input('Icon');
        $stmt->save();
        $response["CV POST"] = $stmt;
        $response["success"] = "1";
        $postjob_data = array(
            $response
        );
        return response()->json($postjob_data);
    }

    public function updateProfile($Fullname,Request $request){
        $stmt = PostCvModel::find($Fullname);
        $stmt->Fullname = $request->input('Fullname');
        $stmt->Email = $request->input('Email');
        $stmt->Address = $request->input('Address');
        $stmt->Icon = $request->input('Icon');
        $stmt->save();
            $response["Users"] = $stmt;
            $response["success"] = "1";
            $user_data = array(
                $response
            );
            return response()->json($user_data);
       }

    public function delete(){
      $data = PostCvModel::find($id);
      $data->delete();
      return response()->json($data);
      $data->save();
    }

    public function readTypeCv($interest ,Request $request){
        $stu = PostCvModel::where('Interest',$interest)->get();
     return response()->json($stu);
    }
    

}
