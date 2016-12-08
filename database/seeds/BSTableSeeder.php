<?php

use Illuminate\Database\Seeder;

class BSTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('bussness_types')->truncate();

        $bussness_type = [
          ['id' => 1, 'bussness_type' => 'software'],
          ['id' => 2, 'bussness_type' => 'marketing'],
          ['id' => 3, 'bussness_type' => 'accounting'],
          ['id' => 4, 'bussness_type' => 'buldings'],
          ['id' => 5, 'bussness_type' => 'tourism'],
        ];
        DB::table('bussness_types')->insert($bussness_type);
    }
}
