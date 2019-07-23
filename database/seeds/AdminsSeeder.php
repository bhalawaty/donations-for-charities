<?php

use Illuminate\Database\Seeder;
use App\Admin;

class AdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (config('default.admins') as $admin) {
            $data = array_merge(['name' => $admin['name'], 'email' => $admin['email'], 'role' => $admin['role']], ['password' => bcrypt($admin['password'])]);

            Admin::create($data);
        }
    }
}
