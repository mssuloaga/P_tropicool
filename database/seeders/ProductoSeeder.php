<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table("productos")->insert(
            array(
                  
                  'nombre'     => "Protector Iphone 8",
                  'descripcion'  => 'Carcasa transparente de cilicona',
                  'precio'  => '6000',
                  'cantidad'  => '10',
                  'imagen'  => 'null',
                  'id_categorias'  => '1',
                  
              )
        );
        \DB::table("productos")->insert(
            array(
                  
                  'nombre'     => "Protector Iphone 13",
                  'descripcion'  => 'Carcasa de cilicona roja',
                  'precio'  => '7000',
                  'cantidad'  => '15',
                  'imagen'  => 'null',
                  'id_categorias'  => '1',
                  
              )
        );
        \DB::table("productos")->insert(
            array(
                  
                  'nombre'     => "Cargador Iphone ",
                  'descripcion'  => 'Cargador de 5 volt blanco usb ',
                  'precio'  => '15000',
                  'cantidad'  => '15',
                  'imagen'  => 'null',
                  'id_categorias'  => '2',
                  
              )
        );
        \DB::table("productos")->insert(
            array(
                  
                  'nombre'     => "Cargador de carga rapida Iphone ",
                  'descripcion'  => 'Cargador de 14.5 volt blanco usb-c ',
                  'precio'  => '24000',
                  'cantidad'  => '11',
                  'imagen'  => 'null',
                  'id_categorias'  => '2',
                  
              )
        );
    }
}
