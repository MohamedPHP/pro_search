<?php

use Illuminate\Database\Seeder;

class CompanyDatasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('company_datas')->truncate();
        // `id`, `name`, `email`, `email`, `phones`, `website`, `business_type_d`
        $companies = [
            [
                'name'            => 'data' . rand(1, 1000000),
                'email'         => 'mohamedzayed709@yahoo.com' . rand(1, 1000000),
                'address'           => 'NasrCity' . rand(1, 1000000),
                'business_type_d' => rand(1,5),
                'phones'          => rand(1111, 22552255),
                'website'         => 'http://localhost:8000',
            ],
            [
                'name'            => 'data' . rand(1, 1000000),
                'email'         => 'mohamedzayed709@yahoo.com' . rand(1, 1000000),
                'address'           => 'NasrCity' . rand(1, 1000000),
                'business_type_d' => rand(1,5),
                'phones'          => rand(1111, 22552255),
                'website'         => 'http://localhost:8000',
            ],
            [
                'name'            => 'data' . rand(1, 1000000),
                'email'         => 'mohamedzayed709@yahoo.com' . rand(1, 1000000),
                'address'           => 'NasrCity' . rand(1, 1000000),
                'business_type_d' => rand(1,5),
                'phones'          => rand(1111, 22552255),
                'website'         => 'http://localhost:8000',
            ],
            [
                'name'            => 'data' . rand(1, 1000000),
                'email'         => 'mohamedzayed709@yahoo.com' . rand(1, 1000000),
                'address'           => 'NasrCity' . rand(1, 1000000),
                'business_type_d' => rand(1,5),
                'phones'          => rand(1111, 22552255),
                'website'         => 'http://localhost:8000',
            ],
            [
                'name'            => 'data' . rand(1, 1000000),
                'email'         => 'mohamedzayed709@yahoo.com' . rand(1, 1000000),
                'address'           => 'NasrCity' . rand(1, 1000000),
                'business_type_d' => rand(1,5),
                'phones'          => rand(1111, 22552255),
                'website'         => 'http://localhost:8000',
            ],
            [
                'name'            => 'data' . rand(1, 1000000),
                'email'         => 'mohamedzayed709@yahoo.com' . rand(1, 1000000),
                'address'           => 'NasrCity' . rand(1, 1000000),
                'business_type_d' => rand(1,5),
                'phones'          => rand(1111, 22552255),
                'website'         => 'http://localhost:8000',
            ],
            [
                'name'            => 'data' . rand(1, 1000000),
                'email'         => 'mohamedzayed709@yahoo.com' . rand(1, 1000000),
                'address'           => 'NasrCity' . rand(1, 1000000),
                'business_type_d' => rand(1,5),
                'phones'          => rand(1111, 22552255),
                'website'         => 'http://localhost:8000',
            ],
            [
                'name'            => 'data' . rand(1, 1000000),
                'email'         => 'mohamedzayed709@yahoo.com' . rand(1, 1000000),
                'address'           => 'NasrCity' . rand(1, 1000000),
                'business_type_d' => rand(1,5),
                'phones'          => rand(1111, 22552255),
                'website'         => 'http://localhost:8000',
            ],
            [
                'name'            => 'data' . rand(1, 1000000),
                'email'         => 'mohamedzayed709@yahoo.com' . rand(1, 1000000),
                'address'           => 'NasrCity' . rand(1, 1000000),
                'business_type_d' => rand(1,5),
                'phones'          => rand(1111, 22552255),
                'website'         => 'http://localhost:8000',
            ],
            [
                'name'            => 'data' . rand(1, 1000000),
                'email'         => 'mohamedzayed709@yahoo.com' . rand(1, 1000000),
                'address'           => 'NasrCity' . rand(1, 1000000),
                'business_type_d' => rand(1,5),
                'phones'          => rand(1111, 22552255),
                'website'         => 'http://localhost:8000',
            ],
            [
                'name'            => 'data' . rand(1, 1000000),
                'email'         => 'mohamedzayed709@yahoo.com' . rand(1, 1000000),
                'address'           => 'NasrCity' . rand(1, 1000000),
                'business_type_d' => rand(1,5),
                'phones'          => rand(1111, 22552255),
                'website'         => 'http://localhost:8000',
            ],
            [
                'name'            => 'data' . rand(1, 1000000),
                'email'         => 'mohamedzayed709@yahoo.com' . rand(1, 1000000),
                'address'           => 'NasrCity' . rand(1, 1000000),
                'business_type_d' => rand(1,5),
                'phones'          => rand(1111, 22552255),
                'website'         => 'http://localhost:8000',
            ],
            [
                'name'            => 'data' . rand(1, 1000000),
                'email'         => 'mohamedzayed709@yahoo.com' . rand(1, 1000000),
                'address'           => 'NasrCity' . rand(1, 1000000),
                'business_type_d' => rand(1,5),
                'phones'          => rand(1111, 22552255),
                'website'         => 'http://localhost:8000',
            ],
            [
                'name'            => 'data' . rand(1, 1000000),
                'email'         => 'mohamedzayed709@yahoo.com' . rand(1, 1000000),
                'address'           => 'NasrCity' . rand(1, 1000000),
                'business_type_d' => rand(1,5),
                'phones'          => rand(1111, 22552255),
                'website'         => 'http://localhost:8000',
            ],
            [
                'name'            => 'data' . rand(1, 1000000),
                'email'         => 'mohamedzayed709@yahoo.com' . rand(1, 1000000),
                'address'           => 'NasrCity' . rand(1, 1000000),
                'business_type_d' => rand(1,5),
                'phones'          => rand(1111, 22552255),
                'website'         => 'http://localhost:8000',
            ],
            [
                'name'            => 'data' . rand(1, 1000000),
                'email'         => 'mohamedzayed709@yahoo.com' . rand(1, 1000000),
                'address'           => 'NasrCity' . rand(1, 1000000),
                'business_type_d' => rand(1,5),
                'phones'          => rand(1111, 22552255),
                'website'         => 'http://localhost:8000',
            ],
            [
                'name'            => 'data' . rand(1, 1000000),
                'email'         => 'mohamedzayed709@yahoo.com' . rand(1, 1000000),
                'address'           => 'NasrCity' . rand(1, 1000000),
                'business_type_d' => rand(1,5),
                'phones'          => rand(1111, 22552255),
                'website'         => 'http://localhost:8000',
            ],
            [
                'name'            => 'data' . rand(1, 1000000),
                'email'         => 'mohamedzayed709@yahoo.com' . rand(1, 1000000),
                'address'           => 'NasrCity' . rand(1, 1000000),
                'business_type_d' => rand(1,5),
                'phones'          => rand(1111, 22552255),
                'website'         => 'http://localhost:8000',
            ],
            [
                'name'            => 'data' . rand(1, 1000000),
                'email'         => 'mohamedzayed709@yahoo.com' . rand(1, 1000000),
                'address'           => 'NasrCity' . rand(1, 1000000),
                'business_type_d' => rand(1,5),
                'phones'          => rand(1111, 22552255),
                'website'         => 'http://localhost:8000',
            ],
            [
                'name'            => 'data' . rand(1, 1000000),
                'email'         => 'mohamedzayed709@yahoo.com' . rand(1, 1000000),
                'address'           => 'NasrCity' . rand(1, 1000000),
                'business_type_d' => rand(1,5),
                'phones'          => rand(1111, 22552255),
                'website'         => 'http://localhost:8000',
            ],
            [
                'name'            => 'data' . rand(1, 1000000),
                'email'         => 'mohamedzayed709@yahoo.com' . rand(1, 1000000),
                'address'           => 'NasrCity' . rand(1, 1000000),
                'business_type_d' => rand(1,5),
                'phones'          => rand(1111, 22552255),
                'website'         => 'http://localhost:8000',
            ],
            [
                'name'            => 'data' . rand(1, 1000000),
                'email'         => 'mohamedzayed709@yahoo.com' . rand(1, 1000000),
                'address'           => 'NasrCity' . rand(1, 1000000),
                'business_type_d' => rand(1,5),
                'phones'          => rand(1111, 22552255),
                'website'         => 'http://localhost:8000',
            ],
            [
                'name'            => 'data' . rand(1, 1000000),
                'email'         => 'mohamedzayed709@yahoo.com' . rand(1, 1000000),
                'address'           => 'NasrCity' . rand(1, 1000000),
                'business_type_d' => rand(1,5),
                'phones'          => rand(1111, 22552255),
                'website'         => 'http://localhost:8000',
            ],
            [
                'name'            => 'data' . rand(1, 1000000),
                'email'         => 'mohamedzayed709@yahoo.com' . rand(1, 1000000),
                'address'           => 'NasrCity' . rand(1, 1000000),
                'business_type_d' => rand(1,5),
                'phones'          => rand(1111, 22552255),
                'website'         => 'http://localhost:8000',
            ],
            [
                'name'            => 'data' . rand(1, 1000000),
                'email'         => 'mohamedzayed709@yahoo.com' . rand(1, 1000000),
                'address'           => 'NasrCity' . rand(1, 1000000),
                'business_type_d' => rand(1,5),
                'phones'          => rand(1111, 22552255),
                'website'         => 'http://localhost:8000',
            ],
            [
                'name'            => 'data' . rand(1, 1000000),
                'email'         => 'mohamedzayed709@yahoo.com' . rand(1, 1000000),
                'address'           => 'NasrCity' . rand(1, 1000000),
                'business_type_d' => rand(1,5),
                'phones'          => rand(1111, 22552255),
                'website'         => 'http://localhost:8000',
            ],
       ];
        DB::table('company_datas')->insert($companies);
    }
}
