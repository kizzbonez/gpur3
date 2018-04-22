<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use DateTime;
use Log;

class DoubleBinaryController extends Controller
{
    //
     public function __construct()
    {
        $this->middleware('auth');
    }




    public function index()
    {

       // return $this->GetDoubleBinaryCommissionHistory(Auth::user()->id)
   //$History =$this->GetDoubleBinaryHistory(Auth::user()->id);
       // return $this->CheckPairing(2);
       // return $this->GetPointsInfo(1);
         $sub_id1 = DB::table('users')->where('upline_id',Auth::user()->id)->where('position_id',1)->first();
         $sub_id2 = DB::table('users')->where('upline_id',Auth::user()->id)->where('position_id',2)->first();
         $sub_id3 = DB::table('users')->where('upline_id',Auth::user()->id)->where('position_id',3)->first();

    // return $this->GetRealPairing(Auth::user()->id,$this->getDownlinesPointsArrray(Auth::user()->id)["left"],$this->getDownlinesPointsArrray(Auth::user()->id)["middle"],$this->getDownlinesPointsArrray(Auth::user()->id)["middle"],$this->getDownlinesPointsArrray(Auth::user()->id)["right"]);

       // return $this->GetPairingPoints(Auth::user()->id);
       // foreach($subs as $sub)
       // {

          //  array_push($arr,array("position"=>$sub->position_id,"points" => $this->getDownlinesPointsArrray($sub->id) ));
        //}
      // 
         $points = array('main'=>$this->GetDownlinePointsArray(Auth::user()->id,true),'left'=>$this->GetDownlinePointsArray($sub_id1->id,true),'middle'=>$this->GetDownlinePointsArray($sub_id2->id,true),'right'=>$this->GetDownlinePointsArray($sub_id3->id,true));
         $pointshistory = array('main'=>$this->GetDownlinePointsArray(Auth::user()->id,false),'left'=>$this->GetDownlinePointsArray($sub_id1->id,false),'middle'=>$this->GetDownlinePointsArray($sub_id2->id,false),'right'=>$this->GetDownlinePointsArray($sub_id3->id,false));

         $pointsinfo =array('main'=>$this->GetPointsInfo(Auth::user()->id),'left'=>$this->GetPointsInfo($sub_id1->id),'middle'=>$this->GetPointsInfo($sub_id2->id),'right'=>$this->GetPointsInfo($sub_id3->id));

         return view("double",['points'=>$points,'hpoints'=>$pointshistory,'info'=>$pointsinfo]);
    
    }


    
    public function GetPoints($userid,$position)
    {

        $result =DB::table('commision_table')->where('commision_type','activation_com')->where('to_id',$userid)->where('remarks',$position)->get();

        $points = 0;


        foreach($result as $res)
        {

            $points += $res->value;
        }

        return $points;

    }


    public function GetDownlinePointsArray($userid,$bool)
    {       
            if($bool == true)
            {
            $left = $this->GetPairedPoints($userid,'LM');
            $lm = $this->GetPairedPoints($userid,'LM');
            $mr = $this->GetPairedPoints($userid,'MR');
            $right = $this->GetPairedPoints($userid,'MR');
            }
            else
            {
             $left = 0;
            $lm = 0;
            $mr = 0;
            $right = 0;

            }


         return array(
                      'left-points'=>$this->GetPoints($userid,"left")-$left,
                      'middle-left-points'=>$this->GetPoints($userid,"middle")-$lm,
                      'middle-right-points'=>$this->GetPoints($userid,"middle")-$mr,
                      'right-points'=>$this->GetPoints($userid,"right")-$right
                      );
    }


     public function GetPointsInfo($userid)
    {

        $result =DB::table('commision_table')->where('commision_type','activation_com')->where('to_id',$userid)->get();

        $info = array();


        foreach($result as $res)
        {

         array_push($info,array('username'=>$this->GetUserName($res->from_id),'side'=>$res->remarks,'points'=>'+ '.$res->value,'time'=>$res->timestmp) );
        }

        return $info;

    }



    public function GetUserName($id)
    {
    $username= '';
    $result =DB::table('users')->where('id',$id)->first();

    if($result->is_sub == '0'){

        $username = $result->username;
    }
    else
    {
        switch($result->position_id){
            case 1: $username = $this->GetUserName($result->is_sub).'(SUB-1)';break;
            case 2: $username = $this->GetUserName($result->is_sub).'(SUB-2)';break;
            case 3: $username = $this->GetUserName($result->is_sub).'(SUB-3)';break;
        }

    }

    return $username; 

    }
   


        public function GetPairedPoints($userid,$position)
    {

        $result =DB::table('commision_table')->where('commision_type','pairing_com')->where('to_id',$userid)->where('remarks',$position)->get();

        $points = 0;


        foreach($result as $res)
        {

            $points += $res->value;
        }

        return $points;

    }


    public function isPairEnough($userid,$side)
    {

     $result =DB::table('commision_table')->where('commision_type','pairing_com')->where('to_id',$userid)->where('remarks',$side)->get();




    }




}
