<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
class UserManagementController extends Controller
{
    //

     public function __construct()
    {
        $this->middleware('auth');
    }

      public function index()
    {

    		



    			if(Auth::user()->status_id === '1')
    				{		//get all users except admin
    						 $users = DB::table('users')->where('status_id','!=','1')->get();



    						return view('usermanagement',['users' => $users]);
    				}
    			else{
    					return "You are not authorize to access this page!";
    				}
    	
    }






    public function ValidateChanges(Request $req)
    {

            $validators = Validator::make($req->all(),[
                'fullname' => 'required|min:5|max:20|unique:users',
                'dob'  =>'required|exists:activation_codes,code,status_id,0',
                'sponsor'  =>'required|exists:users,username,username,'.$request->input('sponsor'),
                'upline' => 'required|not_in:0',
                'position' => 'required|not_in:0',
                 ],
                [

                'code.exists' => 'Invalid or already Used Activation Code',
                'sponsor.exists' =>  "Sponsor's <b>username</b> does not exist.",
                ]);







    }


}
