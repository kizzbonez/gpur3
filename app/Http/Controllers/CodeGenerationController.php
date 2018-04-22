<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
class CodeGenerationController extends Controller
{
    //
     public function __construct()
    {
        $this->middleware('auth');
    }

       public function index()
    {


    			if(Auth::user()->status_id === '1')
    				{

                    $codes = DB::table('activation_codes')->orderByRaw('id DESC')
                    ->get();
                    $actypes = DB::table('actype')
                    ->get();      




    					return view('codegen',['codes' => $codes,'account_types' => $actypes]);
    				}
    			else{
    					return "You are not authorize to access this page!";
    				}


    			
    	
    
    }

        public function codefunction(Request $req)
        {

            // Available alpha caracters

                     if(Auth::user()->status_id === '1')
                    {
                           
                                $actype = DB::table('actype')->where('label',$req->input('type'))->first();

                                $string = $this->generateCode($req->input('qty'));
                                $arrCode = array();
                                     for($i = 1;$i<=$req->input('qty');$i++)
                                     {

                                        $arr = array('name' => $req->input('name'),
                                          'or_si' => $req->input('or_si'),
                                          'total_amount' =>  $req->input('total'),
                                          'code' =>   $string[$i-1],
                                          'status_id' => '0',
                                          'acc_type' =>  $req->input('type'),
                                          'at_id' =>  $this->getAccountType($req->input('type')),
                                          'points' =>  $actype->points,

                                      );
                                            array_push($arrCode, $arr);

                                    }
                                  $insert =  DB::table('activation_codes')->insert(
                                    $arrCode);
                                       

                                            if($insert)
                                            {        
                                                    

                                                return redirect()->route('codegen');
                                            }
                                            else
                                            {
                                                     return 'Something Went Wrong';
                                            }
                                             
                                 




                     }
                                

                      
                else{
                        return "You are not authorize to access this page!";
                    }

              

        }

        public  function getAccountType($type)
        {

           $result = DB::table('actype')->where('label',$type)->first();


           return $result->id;

        }

        public function generateCode($qty)
        {
            $arrCode = array();

             $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

            // generate a pin based on 2 * 7 digits + a random character
               for($a = 1;$a<=$qty;$a++)
            {
            $string ="";
            $pin = mt_rand(1000000, 9999999)
                . $characters[rand(0, strlen($characters) - 5)];

            // shuffle the result
                //checking:
             
                 $max = strlen($characters) - 1;
                 for ($i = 0; $i < 10; $i++) {
                      $string .= $characters[mt_rand(0, $max)];
                 }

                    $count = DB::table('activation_codes')->where('code',$string)->count();
                                if($count > 0 )
                                {
                                 //   goto checking;
                                }
                                else
                                {

                                    array_push($arrCode,$string);

                                  }
        

                 }

         return $arrCode;

    }

    
}
