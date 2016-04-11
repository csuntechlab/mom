<?php 

use Mom\Models\Link;
use Illuminate\Database\Seeder;

class LinkTableSeeder extends Seeder
{
    public function run()
    {
      Link::create([
         'type' => 'linkedin',
         'logo_src' => 'url_to_linkedin_logo'
      ]);
      Link::create([
         'type' => 'portfolium',
         'logo_src' => 'url_to_portfolium_logo'
      ]);
      Link::create([
         'type' => 'github',
         'logo_src' => 'url_to_github_logo'
      ]);
      Link::create([
         'type' => 'website',
         'logo_src' => 'url_to_website_logo'
      ]);
      Link::create([
          'type' => 'project',
          'logo_src' => 'url_to_project'
      ])
    }
}