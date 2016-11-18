<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::statement('SET FOREIGN_KEY_CHECKS=0');
       DB::table('users')->truncate();

       $Users = [
         [
               'id'           => 1,
               'username'     => 'alaaDragneel',
               'firstname'    => 'mohamed',
               'lastname'     => 'alaa eldin',
               'password'     => bcrypt('666666'),
               'phone'        => '01096901954',
               'email'        => 'alaa_dragneel@yahoo.com',


          ],

          [
               'id'           => 2,
               'username'     => 'zayed',
               'firstname'    => 'mohamed',
               'lastname'     => 'zayed',
               'password'     => bcrypt('666666'),
               'phone'        => '012213549852',
               'email'        => 'mohamed_zayed709@yahoo.com',


          ],

         [
               'id'           => 3,
               'username'     => 'sasuke_alaa',
               'firstname'    => 'moa',
               'lastname'     => 'alaa',
               'password'     => bcrypt('666666'),
               'phone'        => '011969019154',
               'email'        => 'moaalaa16@yahoo.com',
               

          ],
       ];
       DB::table('users')->insert($Users);


    }
}
