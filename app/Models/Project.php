<?php

namespace Mom\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'mom.projects';
    protected $primaryKey = 'project_id';
    public $incrementing = false;
    protected $fillable = [
    	'project_id',
    	'start_date',
    	'end_date',
    ];
    protected $hidden = [
    	'project_id',
    ];

    // formatted as Carbon instances on database in order to use ->format('Y-m-d') in views.
    protected $dates = [
        'created_at',
        'updated_at',
        'start_date',
        'end_date',
    ];
}
