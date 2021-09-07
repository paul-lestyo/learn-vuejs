<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Laravel',
                'slug' => 'laravel',
                'created_at' => '2021-07-21 00:05:55',
                'updated_at' => '2021-07-21 00:06:01',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Vue',
                'slug' => 'vue',
                'created_at' => '2021-07-21 00:06:37',
                'updated_at' => '2021-07-21 00:06:42',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'React Js',
                'slug' => 'react',
                'created_at' => '2021-07-12 00:07:17',
                'updated_at' => '2021-07-02 00:07:20',
            ),
        ));
        
        
    }
}