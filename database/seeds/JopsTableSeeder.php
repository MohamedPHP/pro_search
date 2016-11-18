<?php

use Illuminate\Database\Seeder;

class JopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::statement('SET FOREIGN_KEY_CHECKS=0');
         DB::table('jops')->truncate();

         $jops = [
           ['id' => 1, 'content' => 'web development','user_id' => rand(1, 3) ],
           ['id' => 2, 'content' => 'web desgine','user_id' => rand(1, 3) ],
           ['id' => 3, 'content' => 'seo', 'user_id' => rand(1, 3) ],
         ];
         DB::table('jops')->insert($jops);
    }
}
