<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
   /**
   * Run the database seeds.
   *
   * @return void
   */
   public function run()
   {
      // $this->call(LinkTableSeeder::class);
      // $this->call(ProfileTableSeeder::class);
      $this->call(ProjectsTableSeeder::class);
   }
}
