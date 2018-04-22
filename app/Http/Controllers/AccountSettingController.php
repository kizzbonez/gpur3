<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use Illuminate\Support\Facades\DB;
use Hash;
class AccountSettingController extends Controller
{
    //

  public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

    	  


    	return view('accountsetting');
    }




    public function  UpdateInfoProfile(Request $request)
    {

    	  $validators = Validator::make($request->all(),[
    	    	'profile-img' => 'image|mimes:jpeg,png,jpg|max:3000',
                'fullname' => 'required|min:5|max:35',
                'email' => 'required|email',
                'contact' => 'required|min:5|max:35', 
                'address' => 'required',
                'country' => 'required',
                'dob' => 'required',
                'beneficiary' => 'nullable',
                'relation' => 'nullable',
            ]);

    	   if($validators->passes())
                                  {
                                  	if($request->hasFile('profile-img'))
                                  	{
                                  		  $image = $request->file('profile-img');
                                  		    $imagename = Auth::user()->name.time().'.'.$image->getClientOriginalExtension();
                                  		   $destinationPath = public_path('\images');

                                              $image->move($destinationPath, $imagename);

                                           $dest = $imagename;
                                             
                                  	}
                                  	else
                                  	{
                                  		 $dest=Auth::user()->image_path;

                                  	}
                                 
                                  

                                   


                                  $update = DB::table('users')->where('id',Auth::user()->id)->orWhere('is_sub',Auth::user()->id)->update([
                                  	'image_path' => $dest,
                                    'name' => $request->input('fullname'),
                                    'contact_no' => $request->input('contact'),
                                    'address' => $request->input('address'),
                                    'country' => $request->input('country'),
                                    'email' => $request->input('email'),
                                    'dob' => $request->input('dob'),
                                    'beneficiary' => $request->input('beneficiary'),
                                    'beneficiary_relation' => $request->input('relation'),
                                    ]);


                                  	if($update)
                                  	{
                                  		return response()->json(['success'=> 'Updated Successfully']);
                                  	}
                                  	else
                                  	{
                                  		return response()->json(['error'=>$update->errors()->all()]);
                                  	}

                                       
                                  }
                                 else
                                  {
                                    return response()->json(['error'=>$validators->errors()->all()]);
                                   }

    }




    public function changePassword(Request $request)
    {

    		$currentPass = 	$this->passwordCorrect($request->input('current'));

    	$validators = Validator::make($request->all(),[
    	    	'current' => 'required|min:8|max:20',
                'new' => 'required|min:8|max:20',
                'confirmation' => 'required|min:8|max:20|same:new',
               
            ],['confirmation.same'=>'New and Confirmation Password must much!']);

    	if($validators->passes())
    	{
    		$currentPass = 	$this->passwordCorrect($request->input('current'));
    			if($currentPass)
    			{
    					return "password good";
    			}
    			else
    			{

    				return "Current Password Incorrect";
    			}

    	}
    	else
    	{

 				return response()->json(['error'=>$validators->errors()->all()]);
    	}





    }

    private function passwordCorrect($suppliedPassword)
	{
	    return Hash::check($suppliedPassword, Auth::user()->password, []);
	}
}
