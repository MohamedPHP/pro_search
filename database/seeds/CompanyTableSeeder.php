<?php

use Illuminate\Database\Seeder;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('companies')->truncate();
        // `id`, `company_name`, `address`, `username`, `business_type`, `phones`, `website`, `hashedcode`, `password`, `image`, `founder_date`,
        $companies = [
          [
                'id'           => 1,
                'company_name'     => 'Dezique',
                'address'    => 'NasrCity',
                'username'     => 'mohamedzayed709@yahoo.com',
                'business_type'     => rand(1,5),
                'phones'        => '01127946754',
                'website'        => 'http://localhost:8000',
                'hashedcode'          => '@1Dez123',
                'password'       => bcrypt('123123'),
                'image'        => "src/images/logo.png",
                'founder_date'   => '8-12-2016',
           ],
          [
                'id'           => 2,
                'company_name'     => 'Dezique2',
                'address'    => 'NasrCity2',
                'username'     => 'mohamedzayed709@yahoo.com2',
                'business_type'     => rand(1,5),
                'phones'        => '011279467542',
                'website'        => 'http://localhost:8000/2',
                'hashedcode'          => '@2Dez123',
                'password'       => bcrypt('123123'),
                'image'        => "src/images/logo.png",
                'founder_date'   => '8-12-2016',
           ],
          [
                'id'           => 3,
                'company_name'     => 'Dezique3',
                'address'    => 'NasrCity3',
                'username'     => 'mohamedzayed709@yahoo.com3',
                'business_type'     => rand(1,5),
                'phones'        => '011279467543',
                'website'        => 'http://localhost:8000/3',
                'hashedcode'          => '@3Dez123',
                'password'       => bcrypt('123123'),
                'image'        => "src/images/logo.png",
                'founder_date'   => '8-12-2016',
           ],
       ];
        DB::table('companies')->insert($companies);
    }
}
