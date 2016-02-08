<?php 

use Mom\Models\Link;
use Illuminate\Database\Seeder;

class LinkTableSeeder extends Seeder
{
    public function run()
    {
      Link::create([
         'type' => 'linkedin',
         'logo_src' => ''
      ]);
      Link::create([
         'type' => 'portfolium',
         'logo_src' => ''
      ]);
      Link::create([
         'type' => 'github',
         'logo_src' => ''
      ]);
      Link::create([
         'type' => 'website',
         'logo_src' => ''
      ]);
    }
}