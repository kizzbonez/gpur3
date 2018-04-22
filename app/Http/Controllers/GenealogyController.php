<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Http\Controllers\DoubleBinaryController;
class GenealogyController extends Controller
{
    //

     public function __construct()
    {
        $this->middleware('auth');
    }



        public function isCompletedThree($user_id)
        {
           $down_count = DB::table('users')->where('upline_id',$user_id)->where('status_id','2')->count();

           if($down_count >=3 )
           {
            
             DB::table('users')->where('id',$user_id)->update(["fl_state"=>1,"sf_state"=>1]);

           //  $this->PutUplinesCom($user_id);

            return 1;
           }
           else
           {
            return 0;
           }
           

        }  

     public function genealogyView($user_id)
     {

       //   return $this->DoublBinaryPairing(3);
          //  $arr1 = array();
       // return $this->GetUplines(11);
     // return $this->GiveCommision('2','JL1185V6I0');
                  //$doublebinary = new DoubleBinaryController();
         // return $this->Pair();
                //  return $doublebinary->GetDownlinePointsArray(1);

                  $user_info = DB::table('users')->where('id',$user_id)->first();

                  $upline_user =  $user_info->id;
                  $ranking_user = $user_info->ranking_id;
                  $username_user=  $user_info->username;
                  $image_user=  asset('images////'.$user_info->image_path);
                  $acimage_level= $this->GetAccountTypeImage($user_info->at_id);
                   $at_id=  $user_info->at_id;


            



                for ($i=0; $i <3 ; $i++) { 
                  $level1= DB::table('users')->where('upline_id',$upline_user)->where('position_id',($i+1))->first();
                  $id  =       (empty($level1))? "0":$level1->id;
                  $upline_id = (empty($level1)) ? "0":$level1->upline_id;
                  $ranking_id =(empty($level1)) ? "0":$level1->ranking_id;
                  $username =     "Sub".($i+1)."-".$user_info->username;
                  $position = (empty($level1))? "0":$level1->position_id;
                  $status =  (empty($level1))? "-1":$level1->status_id;
                  $at_id1=  (empty($level1))? "0":$level1->at_id;
                  $image_level1=  (empty($level1)) || $level1->status_id === '0' ? asset('images/'."default_profile.jpg"):asset('images/'.$level1->image_path);
                   $acimage_level1=(empty($level1)) || $level1->at_id === '0' ? $this->GetAccountTypeImage(0):$this->GetAccountTypeImage($level1->at_id);




                  

                     for ($a=0; $a <3 ; $a++) { 
                       $level2= DB::table('users')->where('upline_id', $id)->where('position_id',($a+1))->first();
                        $id2  =       (empty($level2)) ? "0":$level2->id;
                        $upline_id2 = (empty($level2)) ? "0":$level2->upline_id;
                        $ranking_id2 =(empty($level2)) ? "0":$level2->ranking_id;
                        $username2 = (empty($level2)) ? ($i+1).":N/A-".($a+1):$level2->username;
                        $position2 = (empty($level2)) ? "0":$level2->position_id;
                         $status2 =  (empty($level2))? "-1":$level2->status_id;
                         $at_id2=  (empty($level2))? "0":$level2->at_id;
                       $image_level2=  (empty($level2)) || $level2->status_id === '0'? asset('images/'."default_profile.jpg"):asset('images/'.$level2->image_path);
                       $acimage_level2= (empty($level2) || $level2->at_id === '0' )? $this->GetAccountTypeImage(0):$this->GetAccountTypeImage($level2->at_id);



                         $arr2[$a] = array("id"=>$id2,"username"=>$username2,"upline_id"=>$upline_id2,"ranking_id"=>$ranking_id2,"position_id"=>$position2,"status"=>$status2,"image" => $image_level2,"actype_image"=> $acimage_level2,"at_id" => $at_id2);

                    }
        


                  
                  $arr[$i] = array("id"=>$id,"username"=>$username,"$upline_id"=>$upline_id,"ranking_id"=>$ranking_id,"position_id"=>$position,"image" => $image_level1,"status"=>$status,"downline"=>$arr2,"actype_image"=> $acimage_level1,"at_id" => $at_id1);

                }

                $user_tree = array("id"=>$user_id,"username"=>$username_user,"$upline_id"=>$upline_user,"ranking_id"=>$ranking_user,"image" => $image_user,"downline"=>$arr,"actype_image"=> $acimage_level, "at_id" => $at_id);


                /*
                foreach ($level1 as $lvl1) 
                {
                  $level2 = DB::table('users')->where('upline_id',$lvl1->id)->orderby('position_id')->get();

                    foreach($level2 as $lvl2)
                    {
                        $arr2[] = array( "username"=>$lvl2->username,
                                            "position_id"=>$lvl2->position_id );

                    }




                 $arr1[] = array( "username"=>$lvl1->username,
                                            "position_id"=>$lvl1->position_id);
                                      

                }
                  */



    return view('genealogy',["tree"=>$user_tree,"userid"=>$user_id]);
           
            //  return json_encode($user_tree);
     }



   public function GetAccountTypeImage($type)
   {

        $acimage_level = ""  ;                    
                switch($type)
                      {
                        case 1: $acimage_level = asset('images/accounts/'."platinum.png");
                                break;
                        case 2: $acimage_level = asset('images/accounts/'."executive.png");
                                break;
                        case 3: $acimage_level = asset('images/accounts/'."free.png");
                                break;
                        case 4: $acimage_level = asset('images/accounts/'."cd.png");
                                break;
                        default:$acimage_level = asset('images/accounts/'."inactive.png");
                                break;

                      }



                    return  $acimage_level;

   }


     public function formValidationPost(Request $request)
    {

        if ($request->input('regtype') == "self")
        {

         
        // Validate the value...
               // 'activationcode' => 'required|min:10|max:10',
               $validators = Validator::make($request->all(),[
                 'username' => 'required|min:5|max:20|unique:users',
                'code'  =>'required|exists:activation_codes,code,status_id,0',
                'sponsor'  =>'required|exists:users,username,username,'.$request->input('sponsor'),
                'upline' => 'required|not_in:0',
                'position' => 'required|not_in:0',
                 ],
                [

                'code.exists' => 'Invalid or already Used Activation Code',
                'sponsor.exists' =>  "Sponsor's <b>username</b> does not exist.",
                ]);

               //  '
                if ($validators->passes()) {

           //+
                    // 
                // return response()->json(['success'=>'Added new records.']);
                       

                    

                         $user = DB::table('users')->where('id',$request->input('userid'))->first();
                          $sponsor = DB::table('users')->where('username',$request->input('sponsor'))->first();

                                  $register = DB::table('users')->insertGetId([
                                    'name' => $user->name,
                                    'username' => $request->input('username'),
                                    'password' => $user->password,
                                    'contact_no' => $user->contact_no,
                                    'address' => $user->address,
                                    'country' => $user->country,
                                    'email' => $user->email,
                                    'dob' => $user->dob,
                                    'beneficiary' => $user->beneficiary,
                                    'beneficiary_relation' => $user->beneficiary_relation,
                                    'sponsor_id' => $sponsor->id,
                                    'upline_id' => $request->input('upline'),
                                    'position_id' => $request->input('position'),
                                    'ranking_id' => '0',
                                    'status_id' => '2',
                                    'is_sub' => $request->input('userid'), 
                                    'image_path' => $user->image_path,
                                    ]);

                                  if($register)
                                  {
                                    DB::table('activation_codes')->where('code',$request->input('code'))
                                     ->update(['status_id' => '1','user_id'=> $register]);
                                     $this->InsertActivationHistory($register,$request->input('code'),"N/A");
                                     // $this->DoublBinaryPairing($register);
                                    $this->isCompletedThree($request->input('upline'));
                                       return response()->json(['success'=> 'Registered Successfully']);
                                  }
                                 else
                                  {
                                    return response()->json(['error'=>$register->errors()->all()]);
                                   }


                  }
                  return response()->json(['error'=>$validators->errors()->all()]);

             //  if($validator->passes()) {

                         // $user = DB::table('users')->where('id',$request->input('userid'))->first();
                              /*
                                  $register = DB::table('users')->insert([
                                    'name' => $user->name,
                                    'username' => $request->input('self_username'),
                                    'password' => $user->password,
                                    'contact_no' => $user->contact_no,
                                    'address' => $user->address,
                                    'country' => $user->country,
                                    'email' => $user->email,
                                    'dob' => $user->dob,
                                    'beneficiary' => $user->beneficiary,
                                    'beneficiary_relation' => $user->beneficiary_relation,
                                    'sponsor_id' => $user->id,
                                    'upline_id' => $user->id,
                                    'position_id' => '1',
                                    'ranking_id' => '1',
                                    'status_id' => '1',
                                    ]);
                                       */
                               //  if($register)
                                 // {
                                //  return response()->json(['success'=> 'Successa']);
                               //   }
                               // else
                               // {
                             // return response()->json(['error'=>"something Went wrong"]);
                             //   }

                //   return response()->json(['success'=> 'try lang']);

              //  }
               //  else
              //  {
                 //   return response()->json(['success'=> 'Success']);
                                //  }
                                 // else
               // }

                //  return response()->json(['error'=>$validator->errors()->all()]);

                    

    
        /*
       

    */



   



        }
        else if($request->input('regtype') == "activation")
        { 

       
       
                  $validator = Validator::make($request->all(),[
                'code'  =>'required|exists:activation_codes,code,status_id,0',
                
                ],
                 [
                'code.exists' => 'Invalid or already Used Activation Code'
                ]);
                   

                   if ($validator->passes()) {
                     
                     DB::table('activation_codes')->where('code',$request->input('code'))
                                    ->update(['status_id' => '1','user_id'=> $request->input('id')]);

                    DB::table('users')->where('id',$request->input('id'))
                                   ->update(['status_id' => '2','at_id'=>$this->getActivationCodeType($request->input('code'))]);

                  // $compoints  = $this->ActivationCommision($request->input('id'),$this->getActivationCodeComPoints($request->input('code')));


                    $upline_id = DB::table('users')->where('id',$request->input('id'))->first();
                    $this->InsertActivationHistory($request->input('id'),$request->input('code'),"N/A");
                      $this->GiveCommision($request->input('id'),$request->input('code'));
                       $this->Pair();
                          //$this->DoublBinaryPairing($request->input('id'));
                           $this->isCompletedThree($upline_id->upline_id);
                         return response()->json(['success'=> 'Slot is now activated.']);

                   }
                      return response()->json(['error'=>$validator->errors()->all()]);

                      

        }
          else if($request->input('regtype') == "upgrade")
        { 

       
       
                  $validator = Validator::make($request->all(),[
                'code'  =>'required|exists:activation_codes,code,status_id,0',
                
                ],
                 [
                'code.exists' => 'Invalid or already Used Activation Code'
                ]);
                   

                   if ($validator->passes()) {
                     
                     DB::table('activation_codes')->where('code',$request->input('code'))
                                    ->update(['status_id' => '1','user_id'=> $request->input('id')]);

                    DB::table('users')->where('id',$request->input('id'))
                                   ->update(['at_id'=>$this->getActivationCodeType($request->input('code'))]);

                  //  $upline_id = DB::table('users')->where('id',$request->input('id'))->first();

                    // $compoints  = $this->ActivationCommision($request->input('id'),$this->getActivationCodeComPoints($request->input('code')));
                             $this->InsertActivationHistory($request->input('id'),$request->input('code'),"N/A");
                               $this->GiveCommision($request->input('id'),$request->input('code'));
                               $this->Pair();
                       // $this->DoublBinaryPairing($request->input('id'));
                          // $this->isCompletedThree($upline_id->upline_id);
                         return response()->json(['success'=> 'You have Successfully upgraded your account.']);

                   }
                      return response()->json(['error'=>$validator->errors()->all()]);

                      

        }
        else if($request->input('regtype') == "new")
        {




                $validator = Validator::make($request->all(),[
                'name' => 'required|min:5|max:35',
                'username' => 'required|min:5|max:20|unique:users',
                'email' => 'required|email',
                'contact' => 'required|min:5|max:35',
                'password' => 'required|min:3|max:20',
                'password_confirmation' => 'required|min:3|max:20|same:password',
                'address' => 'required',
                'country' => 'required',
                'dob' => 'required',
                'beneficiary' => 'nullable',
                'relationship' => 'nullable',
                 'sponsor'  =>'required|exists:users,username,username,'.$request->input('sponsor'),
                'code'  =>'required|exists:activation_codes,code,status_id,0',
                
            ],
             [

                'code.exists' => 'Invalid or already Used Activation Code',
                'sponsor.exists' =>  "Sponsor's <b>username</b> does not exist.",
                ]);

                 if ($validator->passes()) {

                          $sponsor = DB::table('users')->where('username',$request->input('sponsor'))->first();

                         $register = DB::table('users')->insertGetId([
                                    'name' => $request->input('name'),
                                    'username' => $request->input('username'),
                                    'password' => bcrypt($request->input('password')),
                                    'contact_no' => $request->input('contact'),
                                    'address' => $request->input('address'),
                                    'country' => $request->input('country'),
                                    'email' => $request->input('email'),
                                    'dob' => $request->input('dob'),
                                    'beneficiary' => $request->input('beneficiary'),
                                    'beneficiary_relation' => $request->input('relationship'),
                                    'sponsor_id' => $sponsor->id,
                                    'upline_id' => $request->input('upline'),
                                    'position_id' => $request->input('position'),
                                    'ranking_id' => '0',
                                    'status_id' => '2',
                                    'is_sub' => '0',
                                    'at_id' => $this->getActivationCodeType($request->input('code')),
                                    'main_id' => '0',
                                    'image_path' => 'default_profile_active.png',
                                    ]);
                          //return response()->json(['success'=> 'assasssdsd']);

                                // $compoints  = $this->ActivationCommision($register,$this->getActivationCodeComPoints($request->input('code')));

                                 $this->GiveCommision($register,$request->input('code'));
                                 $this->Pair();
                               DB::table('users')->where('id',$register)->update(["main_id"=>$register]);

                         for($i=0;$i<3;$i++)
                         {
                        
                          DB::table('users')->insertGetId([
                                    'name' => $request->input('name'),
                                    'username' => null,
                                    'password' => null,
                                    'contact_no' => $request->input('contact'),
                                    'address' => $request->input('address'),
                                    'country' => $request->input('country'),
                                    'email' => $request->input('email'),
                                    'dob' => $request->input('dob'),
                                    'beneficiary' => $request->input('beneficiary'),
                                    'beneficiary_relation' => $request->input('relationship'),
                                    'sponsor_id' => $sponsor->id,
                                    'upline_id' => $register,
                                    'position_id' => $i+1,
                                    'ranking_id' => '0',
                                    'status_id' => '0',
                                    'at_id' =>'0',
                                    'is_sub' => $register,
                                    'main_id' => $register,
                                    'image_path' => 'default_profile.jpg',
                                    ]);
                      
                         }



                            

                              if($register)
                                  { 

                                    DB::table('activation_codes')->where('code',$request->input('code'))
                                     ->update(['status_id' => '1','user_id'=> $register]);
                                     $this->InsertActivationHistory($register,$request->input('code'),"N/A");
                                      // $pair = $this->DoublBinaryPairing($register);
                                     $this->isCompletedThree($request->input('upline'));
                                   return response()->json(['success'=> 'Registered Successfully']);
                                 }
                                 else
                                  {
                                 return response()->json(['error'=>$register->errors()->all()]);
                                 }
                                       // return response()->json(['success'=> 'Success']);
                  }
                  return response()->json(['error'=>$validator->errors()->all()]);

        }

      

    


    }

  public function ActivationCommision($userid,$points)
      {
        $insertCommision = DB::table('commision_table')->insert([
                                                                "commision_type"=>"double",
                                                                "value"=>$points,
                                                                "from_id"=>$userid,
                                                                "to_id"=>"0",
                                                                "remarks"=>"all_uplines",
                                                              ]);

        if($insertCommision)
        {
          return true;
        }
        else
        {
          return false;
        }

      }

public  function getActivationCodeType($code)
{

   $result = DB::table('activation_codes')->where('code',$code)->first();


   return $result->at_id;

}

public  function InsertActivationHistory($user_id,$code,$aclabel)
{

   $insert = DB::table('activation_history')->insert(["code"=>$code,"user_id"=>$user_id,"ac_type"=>$aclabel]);

   if($insert)
   {
    return 1;
   }
   else
   {
    return 0;
   }
   

}


public  function getActivationCodeComPoints($code)
{

   $result = DB::table('activation_codes')->where('code',$code)->first();


   return $result->points;

}

    public function GetDownlines($userid)
    {
        $downline_id = DB::table('users')->where('upline_id',$userid)->get();
        $total =0;


       foreach($downline_id as $down)
       {

        $total = $total + 1+ ($this->GetDownlines($down->id));


       }



          return $total;



    }




        public function PutUplinesCom($userid)
        {

            if($userid =="-1")
            {

              return 0;
            }
            else
            {
              $uplines_id = DB::table('users')->where('id',$userid)->first();




              DB::table('commision_table')->insert(["commision_type" =>"double","value"=>"250","from_id"=>$userid,"to_id"=>$uplines_id->upline_id,"remarks"=>"left"]);

                DB::table('commision_table')->insert(["commision_type" =>"double","value"=>"250","from_id"=>$userid,"to_id"=>$uplines_id->upline_id,"remarks"=>"right"]);

              
                   $this->PutUplinesCom($uplines_id->upline_id);
                   return 1;
           
                }
                  
          
          }
     



    


    public function ThisMethod($userid)

    {



      return  $this->GetDownlines($userid);

    }



    public function CheckCodeInfo($code)
    {


      $codeinfo = DB::table('activation_codes')->where('code',$code)->first();
      return $codeinfo;
      
    }



    public function DoublBinaryPairing($id)
    {


      $info = DB::table('users')->where('id',$id)->first();
      $userpoints =$this->GetPointsByAT($info->id);
      $pairing = array();
       // $min = min(2,2);
      switch($info->position_id)
      {

        case  1:  $pair = DB::table('users')->where('upline_id',$info->upline_id)->where('position_id',"2")->first();

  
                  array_push($pairing,array("id"=>($pair)?$pair->id:0,
                                            "points" => $this->GetPointsByAT($pair->id),
                    "ac_status" => (( (($pair)?$pair->at_id:0) == 0)?false:true)));

                    if($pair)
                    {
                    DB::table("commision_table")->insert(["value"=>min($userpoints,$this->GetPointsByAT($pair->id)),"commision_type"=>"pairing","from_id"=>$info->id,"to_id"=>$pair->id,"remarks"=>"all_uplines"]);
                    }
                    return true;
                break;
        case  2:



        $pair = DB::table('users')->where('upline_id',$info->upline_id)->where('position_id',"1")->first();

         $left = DB::table('commision_table')->where('from_id',$info->id)->where('to_id',$pair->id)->first();

          $leftpoint = (($left)?$left->value:null);
         
         
         array_push($pairing,array("id"=>($pair)?$pair->id:0,
                    "points" => $this->GetPointsByAT($pair->id),
                    "ac_status" => (( (($pair)?$pair->at_id:0) == 0)?false:true))); 

           if($pair)
                    {

                        if($this->GetPointsByAT($pair->id) ==$leftpoint)
                         {


                         }
                         else
                         {

                         DB::table("commision_table")->insert(["value"=>min($userpoints,$this->GetPointsByAT($pair->id)),"commision_type"=>"pairing","from_id"=>$info->id,"to_id"=>$pair->id,"remarks"=>"all_uplines"]);

                         }
                    }
           

        $pair2 = DB::table('users')->where('upline_id',$info->upline_id)->where('position_id',"3")->first();

         $right = DB::table('commision_table')->where('from_id',$info->id)->where('to_id',$pair2->id)->first();

         $rightpoint = (($right)?$right->value:null);
         
                  
          array_push($pairing,array("id"=>($pair2)?$pair2->id:0,
                    "points" => $this->GetPointsByAT($pair2->id),
                    "ac_status" => (( (($pair2)?$pair2->at_id:0) == 0)?false:true)));  

                    

          if($pair2)
                    {


                        if($this->GetPointsByAT($pair2->id) ==$rightpoint)
                         {


                         }
                         else
                         {


                    DB::table("commision_table")->insert(["value"=>min($userpoints,$this->GetPointsByAT($pair2->id)),"commision_type"=>"pairing","from_id"=>$info->id,"to_id"=>$pair2->id,"remarks"=>"all_uplines"]);
                      }


                    }

          

                      return true;
                break;

        case  3:  
                  $pair = DB::table('users')->where('upline_id',$info->upline_id)->where('position_id',"2")->first();
                  array_push($pairing,array("id"=>($pair)?$pair->id:0,
                      "points" => $this->GetPointsByAT($pair->id),            
                    "ac_status" => (( (($pair)?$pair->at_id:0) == 0)?false:true)));

                     if($pair)
                    {
                    DB::table("commision_table")->insert(["value"=>min($userpoints,$this->GetPointsByAT($pair->id)),"commision_type"=>"pairing","from_id"=>$info->id,"to_id"=>$pair->id,"remarks"=>"all_uplines"]);
                    }
                return true;
                break;

      }

      
      
    }


    public function GetPointsByAT($id)
    {

      $info = DB::table('users')->where('id',$id)->first();
      $infocode = DB::table('actype')->where('id',$info->at_id)->first();

      if($infocode)
      {
          return $infocode->commission;
      }
      else
      {
        return 0;
      }


    }

    public function GetUplines($id)
    {
        if($id === -1)
        {
          return '';

        }
        else
        { 
          $result= DB::table('users')->where('id',$id)->first();
          $position_downline_res= DB::table('users')->where('upline_id',$result->upline_id)->where('id',$id)->first();
          $position= null;
          switch ($position_downline_res->position_id) {
            case 1: $position ="left";break;
            case 2: $position ="middle";break;
            case 3: $position ="right";break;
          }
         // if($result->upline_id === -1)
         // $this->GetUplines($result->upline_id);
          return $result->upline_id.'|'.$position.','.$this->GetUplines($result->upline_id);

        }

    }



    public function GiveCommision($id,$code)
    {
          $arra1 = array();
           $arra1 = $this->GetUplines($id);
           $res = str_replace(',-1|,','',$arra1);
           $final = explode(",",$res);
           $qualified = array();
          $points = $this->getActivationCodeComPoints($code);

           foreach($final as $user){
            $us = explode("|",$user);
            if($this->IsActivated($user)  == true)
            {

            $insert = DB::table('commision_table')->insert(['value' =>$points,
                                                           'from_id' => $id,
                                                            'to_id' => $us[0],
                                                            'commision_type' => 'activation_com',
                                                            'remarks' => $us[1]]);
              array_push($qualified,array('id'=>$us[0],'position'=>$us[1],'points'=>$points));
            }

           }
           return  $qualified;
    }

     public function IsActivated($userid)
   {
         $result =DB::table('activation_history')->where('user_id',$userid)->first();

         if($result)
         {
            return true;
         }
         else
         {
            return false;
         }

   }




   public function Pair()
   {

    $users = DB::table("users")->where('status_id','!=',0)->get();
    $doublebinary = new DoubleBinaryController();
    $ar = Array();

    foreach ($users as $user) {
      $points = $doublebinary->GetDownlinePointsArray($user->id,true);
      $left =$points['left-points'];
      $lm =$points['middle-left-points'];
      $mr =$points['middle-right-points'];
      $right =$points['right-points'];
  // array_push($ar, Array($left,$lm,$mr,$right));

      if(($left != 0 && $left > 0)  && ($lm != 0 && $lm > 0))
      {
          if($left>=$lm){
              $insert = DB::table('commision_table')->insert(['value' =>($lm),
                                                           'from_id' => 0,
                                                            'to_id' => $user->id,
                                                            'commision_type' => 'pairing_com',
                                                            'remarks' => 'LM']);
          }
          elseif($lm>=$left)
          {
              $insert = DB::table('commision_table')->insert(['value' =>($left),
                                                           'from_id' => 0,
                                                            'to_id' => $user->id,
                                                            'commision_type' => 'pairing_com',
                                                            'remarks' => 'LM']);

          }

      }
      if(($right != 0 && $right > 0)  && ($mr != 0 && $mr > 0))
      {

        if($right>=$mr){
              $insert = DB::table('commision_table')->insert(['value' =>($mr),
                                                           'from_id' => 0,
                                                            'to_id' => $user->id,
                                                            'commision_type' => 'pairing_com',
                                                            'remarks' => 'MR']);

          }
          elseif($mr>=$right)
          {
              $insert = DB::table('commision_table')->insert(['value' =>($right),
                                                           'from_id' => 0,
                                                            'to_id' => $user->id,
                                                            'commision_type' => 'pairing_com',
                                                            'remarks' => 'MR']);
            
          }

      }


    }


    return $ar;


   }





}
