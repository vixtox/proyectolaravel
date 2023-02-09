<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Operario']);

        Permission::create(['name' => 'login'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'listaCuotas.index'])->assignRole($role1);
        Permission::create(['name' => 'listaCuotas.create'])->assignRole($role1);
        Permission::create(['name' => 'listaCuotas.edit'])->assignRole($role1);
        Permission::create(['name' => 'listaCuotas.destroy'])->assignRole($role1);
        
        Permission::create(['name' => 'listaEmpleados.index'])->assignRole($role1);
        Permission::create(['name' => 'listaEmpleados.create'])->assignRole($role1);
        Permission::create(['name' => 'listaEmpleados.edit'])->assignRole($role1);
        Permission::create(['name' => 'listaEmpleados.destroy'])->assignRole($role1);
    }
}
