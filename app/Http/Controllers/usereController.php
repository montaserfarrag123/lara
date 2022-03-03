<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\usere;

class usereController extends Controller
{


     public function index(){



         if(auth()->check()){

        $data =  usere :: orderBy('id','desc')->get();



         return view('user.index',["data" => $data]);

     }
     }




    public function create(){
        return view('users.create');
       }


       public function Store(Request $request){
           // code .....

       $data =  $this->validate($request,[
               "name"     => "required|min:3",
               "email"    => "required|email",
               "password" => "required|min:6"
        ]);

         usere::create(["name" => $request->name , "email" => $request->email , "password" => $request->password]);

       $data['password'] = bcrypt($data['password']);

       $op = usere :: create($data);

        if($op){
            $message = 'data inserted';
        }else{
            $message =  'error try again';
        }

        session()->flash('Message',$message);

        return redirect(url('/Usere/'));



       }



  public function edit($id){


     $data = usere :: where('id',$id)->get();
    $data = usere :: find($id);

       return view('students.edit',["data" => $data]);
  }


  public function update(Request $request,$id){


    $data =  $this->validate($request,[
        "name"     => "required|min:3",
        "email"    => "required|email"
      ]);

     $op =  usere :: where('id',$id)->update($data);

     if($op){
        $message = 'Raw Updated';
    }else{
        $message =  'error try again';
    }

    session()->flash('Message',$message);

    return redirect(url('/Usere/'));



  }





    public function delete($id){


     $op =  usere::where('id',$id)->delete();
      $op =  usere::find($id)->delete();
      if($op){
         $message = "Raw Removed";
      }else{
         $message = 'Error Try Again';
      }

       session()->flash('Message',$message);

       return redirect(url('/Student/'));

       }




       public function login(){
           return view('students.login');
       }


       public function doLogin(Request $request){

        $data =  $this->validate($request,[
            "password"  => "required|min:6",
            "email"     => "required|email"
          ]);


          if(auth()->attempt($data)){

           return redirect(url('/user'));

          }else{
              session()->flash('Message','invalid Data');
              return redirect(url('/user/Login'));
          }


       }




       public function LogOut(){
           // code .....

           auth()->logout();
           return redirect(url('/user/Login'));
       }


}


