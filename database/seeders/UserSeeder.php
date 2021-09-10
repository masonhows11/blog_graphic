<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        //
      $user = User::create([
            'user_name'=>'mason',
            'email' => 'mason.hows11@gmail.com',
            'activate' => 1,
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('1289..//')
        ]);

      $user1 = User::create([
          'user_name' => 'james',
          'email'=>'james@gmail.com',
          'activate' => 1,
          'email_verified_at' => Carbon::now(),
          'password'=>bcrypt('1289..//'),
      ]);

        $role_admin = Role::create(['name'=>'admin']);
        $user->assignRole($role_admin);
    }
}
