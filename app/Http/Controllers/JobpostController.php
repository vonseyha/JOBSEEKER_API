<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PostJobModel;
use Illuminate\Support\Facades\Route;
use laravel\Passport\Client;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\File ;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class JobpostController extends Controller
{
    public function uploadOne(UploadedFile $uploadedfile , $folder=null , $disk='public' , $filename = null){
      $name = !is_null($filename) ? $filename : Str::random(25);
      $file = $uploadedfile->storeAs($folder,$name.'.'.$uploadedfile->getClientOriginalExtension(),$disk);
      return $file;
    }
    
    public function store(Request $request){
        $stmt = new PostJobModel();
        $stmt->CompanyName = $request->input('CompanyName');
        $stmt->Term = $request->input('Term');
        $stmt->Title = $request->input('Title');
        $stmt->Requirement = $request->input('Requirement');
        $stmt->Experience = $request->input('Experience');
        $stmt->Email = $request->input('Email');
        $stmt->Address = $request->input('Address');
        $stmt->Lastdate = $request->input('Lastdate');
        $stmt->Phone = $request->input('Phone');
        
    if($request->has('Icon'))
    {
        $image = $request->file('Icon');
        $filename = $request->input('CompanyName');
        $pa = 'storage\app\public\uploads\images'.'/';
        $pathDB = base_path($pa);
        //Define foler path

        $pathlocal = '\uploads\images'.'/';
        $filePath = $pathDB.$filename.'.'.$image->getClientOriginalExtension();
        $FILE = base64_decode($filePath);
        //Uplode Image

        $this->uploadOne($image,$pathlocal,'public',$filename);
        $stmt->Icon = $FILE;
    }
        $stmt->save();
        $response["Job Accountment"] = $stmt;
        $response["success"] = "1";

        $form_data = array(
          $response  
        );

        return response()->json($form_data);
    }


    public  function read(){
      $stu = PostJobModel::all();
      return response()->json($stu); 
   }

   public function showbyid($Companyname){
     $stu = PostJobModel::where('Companyname',$Companyname)->get();
     return response()->json($stu);
   }
  //protected $filltable = ["CompanyName","Term","Title","Requirement","Experience","Email","Address","Lastdate","Phone","Icon"];
  public function update($id,Request $request){
        $stmt = PostJobModel::find($id);
        $stmt->Companyname = $request->input('CompanyName');
        $stmt->Term = $request->input('Term');
        $stmt->Title = $request->input('Title');
        $stmt->Requirement = $request->input('Requirement');
        $stmt->Experience = $request->input('Experience');
        $stmt->Email = $request->input('Email');
        $stmt->Address = $request->input('Address');
        $stmt->lastdate = $request->input('Phone');
        $stmt->Icon = $request->input('Icon');
        $stmt->save();
        $response["Users"] = $stmt;
        $response["success"] = "1";
        $user_data = array(
            $response
        );
        return response()->json($user_data);
   }

   public function updateProfile($Companyname,Request $request){
    $stmt = PostJobModel::find($Companyname);
    $stmt->Companyname = $request->input('CompanyName');
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

   public function delete($id){
      $data = PostJobModel::find($id);
      $data->delete();
      return response()->json($data);
      $data->save();
   }

   public function readTypeJob($Title ,Request $request){
      $stu = PostJobModel::where('Title',$Title)->get();
   return response()->json($stu);
   }

}
