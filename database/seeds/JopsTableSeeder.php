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
           ['id' => 1, 'content' => 'web development'],
           ['id' => 2, 'content' => 'web desgine'],
           ['id' => 3, 'content' => 'seo'],
           ['id' => 4, 'content' => 'Marketing'],
           ['id' => 5, 'content' => 'CEO'],
         ];
         DB::table('jops')->insert($jops);
    }
}
