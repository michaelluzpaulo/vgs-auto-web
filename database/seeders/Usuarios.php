<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Usuarios extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('users')->insert(['id' => 1, 'name' => 'DEVELOPER', 'email' => 'michaelluzpaulo@gmail.com', 'password' =>
    Hash::make('mlp123..'), 'role_id' => 1, "created_at" => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s"), "active" => 1]);
  }
}
