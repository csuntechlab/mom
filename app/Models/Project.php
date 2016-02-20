<?php

namespace Mom\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table ='mom.projectmeta';
    protected $primaryKey = 'project_id';
    public $incrementing = false;
    protected $fillable = ['title','description'];

}
