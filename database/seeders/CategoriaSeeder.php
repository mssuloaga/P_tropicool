<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table("categorias")->insert(
                      array(
                            
                            'nombre'     => "Protectores",
                            'id_empresas'     => "1",
                            
                        )
                  );
        
        \DB::table("categorias")->insert(
                    array(
                          
                          'nombre'     => "Cargadores",
                          'id_empresas'     => "1",
                          
                      )
                );           
    }
}
