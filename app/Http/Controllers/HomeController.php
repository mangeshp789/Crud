<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function update(Request $request,$id){

                        $user = User::find($id);
                        $user->name = $request->firstname;
                        $user->email = $request->email;
                        $update = $user->save();
                        if($update){
                                \Session::flash('message', 'Successful Update Records!'); 
                                \Session::flash('alert-class', 'alert-success'); 
                           return redirect('/display');

                        }


               

    }
    public function delete(Request $request,$id){
                 $user = User::find($id);
                 $deleteRecords = $user->delete();
         if($deleteRecords){
             \Session::flash('message', 'Successful Delete Records!'); 
             \Session::flash('alert-class', 'alert-success'); 
             return redirect('/display');
         }
    }

    public function create(Request $request){

        $Validator =   $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
        

                        $user = new User();
                        $user->name = $request->name;
                        $user->email = $request->email;
                        $user->password = bcrypt($request->password);
                        $user->save();
                        $lastid = $user->id;
                        if($lastid){
                                \Session::flash('message', 'Successful Create Records!'); 
                                \Session::flash('alert-class', 'alert-success'); 
                           return redirect('/display');

                        
        }
    }
}
