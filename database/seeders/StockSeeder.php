<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table("stocks")->insert(
            array(
                  
                  'cantidad'     => "10",
                  'id_productos'  => '1',
                  
              )
        );
        \DB::table("stocks")->insert(
            array(
                  
                  'cantidad'     => "15",
                  'id_productos'  => '1',
                  
              )
        );
        \DB::table("stocks")->insert(
            array(
                  
                  'cantidad'     => "15",
                  'id_productos'  => '2',
                  
              )
        );
        \DB::table("stocks")->insert(
            array(
                  
                  'cantidad'     => "11",
                  'id_productos'  => '2',
                  
              )
        );

    }
}
