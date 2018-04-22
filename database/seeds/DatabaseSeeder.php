<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
      public function run()
    {
        DB::table('users')->insert(array(array(
            'name' => 'gpur_admin',
            'username' => 'kizzbonez',
            'password' => bcrypt('qau8xf3rr'),
            'contact_no' => '09353415221',
            'address' => 'del pilar',
            'country' => 'Philippines',
            'email' => 'gpuradmin'.'@gmail.com',
            'dob' => '1989-02-24',
            'beneficiary' => 'Evelyn Contaoi',
            'beneficiary_relation' => 'Mother',
            'sponsor_id' => '0',
            'upline_id' => '-1',
            'position_id' => '0',
            'ranking_id' => '0',
            'status_id' => '1',
            'at_id' => '1',
            'is_sub' => '0',
            'main_id' => '1',
            'image_path' => 'default_profile_active.png',
        ),array(
            'name' => 'gpur_admin',
            'username' => null,
            'password' => null,
            'contact_no' => '09353415221',
            'address' => 'del pilar',
            'country' => 'Philippines',
            'email' => 'gpuradmin'.'@gmail.com',
            'dob' => '1989-02-24',
            'beneficiary' => 'Evelyn Contaoi',
            'beneficiary_relation' => 'Mother',
            'sponsor_id' => '0',
            'upline_id' => '1',
            'position_id' => '1',
            'ranking_id' => '0',
            'status_id' => '0',
            'is_sub' => '1',
             'at_id' => '0',
            'main_id' => '1',
            'image_path' => 'default_profile_active.png',
        ),array(
            'name' => 'gpur_admin',
          'username' => null,
            'password' => null,
            'contact_no' => '09353415221',
            'address' => 'del pilar',
            'country' => 'Philippines',
            'email' => 'gpuradmin'.'@gmail.com',
            'dob' => '1989-02-24',
            'beneficiary' => 'Evelyn Contaoi',
            'beneficiary_relation' => 'Mother',
            'sponsor_id' => '0',
            'upline_id' => '1',
            'position_id' => '2',
            'ranking_id' => '0',
            'status_id' => '0',
            'is_sub' => '1',
             'at_id' => '0',
            'main_id' => '1',
            'image_path' => 'default_profile_active.png',
        ),array(
            'name' => 'gpur_admin',
           'username' => null,
            'password' => null,
            'contact_no' => '09353415221',
            'address' => 'del pilar',
            'country' => 'Philippines',
            'email' => 'gpuradmin'.'@gmail.com',
            'dob' => '1989-02-24',
            'beneficiary' => 'Evelyn Contaoi',
            'beneficiary_relation' => 'Mother',
            'sponsor_id' => '0',
            'upline_id' => '1',
            'position_id' => '3',
            'ranking_id' => '0',
            'status_id' => '0',
            'is_sub' => '1',
             'at_id' => '0',
            'main_id' => '1',
            'image_path' => 'default_profile_active.png',
        )));

        
            DB::table('actype')->insert(array(array(
            'label' => 'Platinum',
            'points' => '2500',
            'commission' => '2500',
            'remarks' => 'Platinum Account',
        ),
            array(
            'label' => 'Executive',
            'points' => '250',
            'commission' => '250',
            'remarks' => 'Executive Account',
        ),

            array(
            'label' => 'Free',
            'points' => '0',
            'commission' => '0',
            'remarks' => 'Free Account',
        ),

            array(
            'label' => 'Commission Deduction',
            'points' => '-2500',
            'commission' => '0',
            'remarks' => 'Salary Deduction Account',
        ),

        ));
        
        DB::table('activation_history')->insert(["code"=>"ADMINDUMMYACTIVATION","user_id"=>"1","ac_type"=>"Platinum"]);

    }
}
