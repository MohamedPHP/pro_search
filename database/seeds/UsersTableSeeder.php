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
       /*
       `id`, `username`, `firstname`, `lastname`, `password`, `phone`, `email`,
       `age`, `gender`, `hashedcode`, `jop_id`, `isadmin`,
       */
       $Users = [
         [
               'id'           => 1,
               'username'     => 'mohamedphp',
               'firstname'    => 'mohamed',
               'lastname'     => 'zayed',
               'password'     => bcrypt('123123'),
               'phone'        => '01096901954',
               'email'        => 'alaa_dragneel@yahoo.com',
               'age'          => 22,
               'gender'       => 0,
               'hashedcode'   => '#1maza123',
               'jop_id'       => 1,
               'isadmin'      => 1,
          ],
         [
               'id'           => 2,
               'username'     => 'alaa',
               'firstname'    => 'mohamed',
               'lastname'     => 'alaa',
               'password'     => bcrypt('123123'),
               'phone'        => '01127946754',
               'email'        => 'mohamedzayed709@yahoo.com',
               'age'          => 22,
               'gender'       => 0,
               'hashedcode'   => '#2maal123',
               'jop_id'       => 2,
               'isadmin'      => 0,
          ],
       ];
       DB::table('users')->insert($Users);


    }
}
