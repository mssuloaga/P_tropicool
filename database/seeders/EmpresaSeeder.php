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
                            'mision'  => 'Somos una tienda de productos en el área de telefonía móvil para Apple, confiable, eficiente y ética que tiene como principal objetivo el satisfacer las necesidades de nuestros clientes.',
                            'vision'  => 'Ser la tienda online preferente en el rubro de ventas por menor de accesorios para iPhone dentro de la región del Bio-Bio.',
                            'descripcion'  => 'Descripcion',
                            'instagram'  => '__tropicool_',
                            'facebook'  => 'FACABOOK',
                            
                            

                      )
                );

                
          
    }
}
