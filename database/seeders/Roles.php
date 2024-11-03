<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Roles extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('role')->insert(['id' => 1, 'name' => 'Root']);
    DB::table('role')->insert(['id' => 2, 'name' => 'Admin']);
  }
}
