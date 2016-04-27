<?php

use Illuminate\Database\Seeder;

use Mom\Models\Project;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::create([
        	'project_id' => 'projects:22',
        	'start_date' => '2016-04-08 00:00:00',
        	'end_date'   => '2016-05-08 00:00:00'
        ]);

        Project::create([
        	'project_id' => 'projects:23',
        	'start_date' => '2016-04-08 00:00:00',
        	'end_date'   => '2016-05-08 00:00:00'
        ]);

        Project::create([
        	'project_id' => 'projects:24',
        	'start_date' => '2016-04-08 00:00:00',
        	'end_date'   => '2016-05-08 00:00:00'
        ]);

        Project::create([
        	'project_id' => 'projects:25',
        	'start_date' => '2016-04-08 00:00:00',
        	'end_date'   => '2016-05-08 00:00:00'
        ]);

        Project::create([
        	'project_id' => 'projects:28',
        	'start_date' => '2016-04-21 00:00:00',
        	'end_date'   => '2016-05-21 00:00:00'
        ]);


    }
}
