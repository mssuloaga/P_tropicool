<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run(){
          
          
                \DB::table("eventos")->insert(
                      array(
                            
                            'nombre'     => "Feria de monte",
                            'direccion'  => 'Monte Aguila',
                            'fecha_inicio'  => '2021-01-09',
                            'fecha_termino'  => '2021-01-10',
                            'precio'  => '0',
                        )
                  );
                  
                  \DB::table("eventos")->insert(
                        array(
                              
                              'nombre'     => "Feria de Pangal",
                              'direccion'  => 'Pangal',
                              'fecha_inicio'  => '2021-01-28',
                              'fecha_termino'  => '2021-01-30',
                              'precio'  => '2000',
                          )
                    );
    }
}