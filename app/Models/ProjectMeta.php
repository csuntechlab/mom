<?php

namespace Mom\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectMeta extends Model
{
    protected $table ='mom.projectmeta';
    protected $primaryKey = 'project_id';
    public $incrementing = false;
    protected $fillable = [
    	'title',
    	'description'
    ];

    public function dates(){
    	return $this->hasOne(Project::class, 'project_id');
    }
}
