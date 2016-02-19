<?php

namespace Mom\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table ='mom.projectmeta';
    protected $primaryKey = 'project_id';
    protected $fillable = ['title','description'];

}
