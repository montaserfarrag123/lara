<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userController extends Controller
{
    //

    public function create(){
     return view('create');
    }

    public function store(Request $request){

 
      $this->validate($request,[
          "name"  => "required",
          "email" => "required|email",
          "password" => "required|min:6"
      ]);



      echo 'Valid Data';
    }





public function loadData(){

    # Student Data
    // $data = ["Name" => "Root Account" , "Email" => "Root@yahoo.com" , "Age" => 20 , "GPA" => 4];
    // $title = "Student Data";
    // /*
    // 1- Array  []   **
    // 2- with()      **
    // 3- compact()
    // */

    // // return view('profile',["studentData" => $data , "title" => "Student Data"]);

    // // return view('profile')->with(["studentData" =>  $data  , "title" => "Student Data"  ]);


    //    session()->put("Message","Welcome To Laravel Session");  // $_SESSION[KEY] =VALUE
    //    session()->put("Message2","Welcome To Laravel Session22222");
    //    // session()->flash("Message","Welcome To Laravel Session");

    // return view('profile',compact('data','title'));

}




}


