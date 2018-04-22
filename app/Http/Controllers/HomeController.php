<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
    **/
    public function __construct()
    {
        $this->middleware('auth');
    }
 
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $referrals_list = $this->GetDownlinesElement(Auth::user()->id);
        $referral_count = $this->GetDownlines(Auth::user()->id);
        $sub_count = DB::table('users')->where('is_sub',Auth::user()->id)->count();
        return view('home',["rl"=>$referrals_list,"ref_count"=>$referral_count,"sub_counts"=>$sub_count]);
    }











        public function GetDownlinesElement($userid)
    {
        $downline_id = DB::table('users')->where('upline_id',$userid)->get();
        $total ='';


       foreach($downline_id as $down)
       {

       // $total = $total + 1+ ($this->GetDownlines($down->id));
        $total = $total.' <li>
                      <img src="'.asset('images&#47;').$down->image_path.'" alt="User Image">
                      <a class="users-list-name" href="#">'.$down->username.'</a>

                    </li>'.$this->GetDownlinesElement($down->id);

       }


       return $total;
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


}
