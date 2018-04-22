<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use DateTime;

class FollowMeController extends Controller
{

   public function __construct()
    {
        $this->middleware('auth');
    }


   public function index()
    {
    	$myid= array(Auth::user()->id);

    	if(Auth::user()->is_sub != 0)
    		{
    			return 0;

    		}

    	$isfully = DB::table('commision_table')->where('from_id',Auth::user()->id)->where('commision_type','double')->first();
    	$commisionlevel=[];


				  $followme_com = DB::table('meta_variables')->where('meta_name',"follow_me_com")->first();
				  		//return array($ids,$referrals);
				  $arraycom =json_decode($followme_com->meta_value,true);


		$totalearnings= 0;
	   for($i=1;$i<12;$i++)
    	{
    			$ids= [];
    			$comsion=0;
    			$multiplier=$arraycom[$i];
    			$timediffs= [];
    			$referrals = 0;
    				foreach($myid as $id )
    				{

					  	$upline = DB::table('users')->where('main_id',$id)->get();
					  	
					  
					  	foreach($upline as $up)
					  	{
					  		if($up->id == $id)
					  		{

					  		}
					  		else
					  		{
					  			//$array[$up->id] = $this->trylang($up->id);
					  			$downline = DB::table('users')->where('upline_id',$up->id)->get();

					  			foreach ($downline as $nodes) {
					  				# code...
					  					//$referrals += DB::table('users')->where('main_id',$nodes->id)->where('status_id','2')->count();
					  					$ar_id = DB::table('users')->where('main_id',$nodes->id)->where('status_id','2')->get();

					  					foreach($ar_id as $ar)
					  					{

					  						$date1 = new DateTime((empty($isfully))? "0000-00-00 00:00:00":$isfully->timestmp);
											$date2 = new DateTime($ar->created_at);
											$diff = $date1->diff($date2);
					  						
					  						if(empty($isfully))
					  						{

					  						}
					  						else
					  						{
						  						$timediffs[] =($diff->invert === 1)? "passed" : "go";



						  						if($diff->invert !== 1)
						  						{	
						  						$comsion +=  $arraycom[$i];
						  						$referrals +=1;
						  					    }
						  					    $ids[] = $ar->id;
					  						}
					  					}

					  			}
					  		}
					  	}


					 }
					 $totalearnings +=$comsion;
					 $commisionlevel[]= array("level"=>$i,"com"=>$multiplier,"active_ref"=>$referrals,"commission"=>$comsion);
					 $myid= null;
					 $myid = $ids;



    		
    	}	




    	return view('followme',["levels"=>$commisionlevel,"total"=>($totalearnings-$this->GetClaimedFollowMe(Auth::user()->id))]);
    }





  public function trylang($id)
  {




  }



  public function GetClaimedFollowMe($id)
  {


  	$claims = DB::table('commision_table')->where('commision_type','follow')->where('from_id',$id)->where('to_id',$id)->sum('value');

  	return $claims;


  }








}
