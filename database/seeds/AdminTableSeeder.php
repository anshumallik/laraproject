<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = \App\Role::where('name','admin')->first();
        $admin = new \App\Admin();
        $admin->name ='Anshu Mallik';
        $admin->email='anshumallik143@gmail.com';
        $admin->password=bcrypt('12345678');
        $admin->role='Admin';
        $admin->save();
        $admin->roles()->attach($role_admin);
    }
}
