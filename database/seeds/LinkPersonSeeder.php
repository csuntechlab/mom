<?php

use Illuminate\Database\Seeder;

class LinkPersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //Seeder info for arvin's links
      LinkPerson::create([
         'individuals_id' => 'members:104733445',
         'link_id' => '1',
         'link_url' => 'arvin-linkedin.com'
      ]);

      LinkPerson::create([
         'individuals_id' => 'members:104733445',
         'link_id' => '2',
         'link_url' => 'arvin-portfolium.com'
      ]);

      LinkPerson::create([
         'individuals_id' => 'members:104733445',
         'link_id' => '3',
         'link_url' => 'arvin-github.com'
      ]);

      LinkPerson::create([
         'individuals_id' => 'members:104733445',
         'link_id' => '4',
         'link_url' => 'arvin-web.com'
      ]);

      //Seeder info for andrea's links
      LinkPerson::create([
         'individuals_id' => 'members:104844829',
         'link_id' => '1',
         'link_url' => 'andrea-linkedin.com'
      ]);

      LinkPerson::create([
         'individuals_id' => 'members:104844829',
         'link_id' => '2',
         'link_url' => 'andrea-portfolium.com'
      ]);

      LinkPerson::create([
         'individuals_id' => 'members:104844829',
         'link_id' => '3',
         'link_url' => 'andrea-github.com'
      ]);

      LinkPerson::create([
         'individuals_id' => 'members:104844829',
         'link_id' => '4',
         'link_url' => 'andrea-web.com'
      ]);
    }
}
