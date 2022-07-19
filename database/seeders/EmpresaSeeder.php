<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run(){
          
          
                \DB::table("empresas")->insert(
                      array(
                            
                            'nombre'     => "Tropicool",
                            'logo'  => 'logo.png',
                            'direccion'  => 'cabrero',
                            'telefono'  => '987654321',
                            'mision'  => 'MISION',
                            'vision'  => 'VISION',
                            'descripcion'  => 'Descripcion',
                            'instagram'  => 'INSTAGRAM',
                            'facebook'  => 'FACABOOK',
                            
                            

                      )
                );

                
          
    }
}
