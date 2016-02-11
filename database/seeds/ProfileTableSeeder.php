<?php

use Mom\Models\Person;
use Illuminate\Database\Seeder;

class ProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
    */
    public function run()
    {
      ///arvin
      Person::create([
        'user_id' => 'members:104733445',
        'background' => 'Background information for this user.',
        'position' => 'Backend Developer',
        'grad_date' => '5/30/2015'
      ]);
      //andrea
      Person::create([
        'user_id' => 'members:104844829',
        'background' => 'Background information for this user.',
        'position' => 'Scrum Master',
        'grad_date' => '5/30/2016'
      ]);
      //luis
      Person::create([
        'user_id' => 'members:105434158',
        'background' => 'Background information for this user.',
        'position' => 'Tester',
        'grad_date' => '5/30/2017'
      ]);
    }
}
