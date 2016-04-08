<?php

namespace Mom\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectMeta extends Model
{
    protected $table ='mom.projectmeta';
    protected $primaryKey = 'project_id';
    public $incrementing = false;
    protected $fillable = [
    	'display_name',
    	'description'
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    
}
