<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Admin Seeder
        DB::table('admins')->delete();
        DB::table('roles')->delete();
        $user = Admin::create([
            'name' => 'asmaa',
            'email' => 'as60maa@gmail.com',

            'phone' => '1020739010',
            'status'=>'مفعل',
            'roles_name' => ["owner"],
            'password' => Hash::make('11111111'),
        ]);

        $role = Role::create(['name' => 'owner', 'guard_name'=>'admin']);

        $permissions = Permission::pluck('id', 'id')->all();


        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
    }
}
