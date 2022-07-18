<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TrabajadoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table("trabajadores")->insert(
            array(
                  
                  'imagen'     => "tra1.jpg",
                  'rut_trabajador'  => '1999922',
                  'nombre'  => 'Matias',
                  'direccion'  => 'charrua',
                  'telefono'  => '987654321',
                  'email'  => 'mati@gmail.com',
                  'fecha_ingreso'  => '2021-01-01',
                  'sueldo'  => '290000',
                  'cargo'  => 'vendedor',
                  'id_empresas'  => '1',
                  
              )
        );
        \DB::table("trabajadores")->insert(
            array(
                  
                  'imagen'     => "tra2.jpg",
                  'rut_trabajador'  => '1988922',
                  'nombre'  => 'Aburto',
                  'direccion'  => 'Concepcion',
                  'telefono'  => '987054321',
                  'email'  => 'nico@gmail.com',
                  'fecha_ingreso'  => '2021-06-01',
                  'sueldo'  => '200000',
                  'cargo'  => 'empaque',
                  'id_empresas'  => '1',
                  
              )
        );
        \DB::table("trabajadores")->insert(
            array(
                  
                  'imagen'     => "tra3.jpg",
                  'rut_trabajador'  => '1999922',
                  'nombre'  => 'Maria',
                  'direccion'  => 'Chiguayante',
                  'telefono'  => '987654331',
                  'email'  => 'meri@gmail.com',
                  'fecha_ingreso'  => '2020-01-01',
                  'sueldo'  => '2500000',
                  'cargo'  => 'vendedora',
                  'id_empresas'  => '1',
                  
              )
        );
    }
}
