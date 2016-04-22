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

    // formatted as Carbon instances on database in order to use ->format('Y-m-d') in views.
    protected $dates = [
        'created_at',
        'updated_at',
        'start_date',
        'end_date',
    ];

    public function meta() {
        return $this->hasOne('Mom\Models\ProjectMeta', 'project_id');
    }

    public function members() {
        return $this->belongsToMany('Mom\Models\User', 'mom.person_project', 'project_id', 'individuals_id')
                ->withPivot('role_position')
                ->wherePivot('role_position', 'member')
                ->wherePivot('confidential', 0);
    }

    public function productOwner() {
        return $this->belongsToMany('Mom\Models\User', 'mom.person_project', 'project_id', 'individuals_id')
                ->withPivot('role_position')
                ->wherePivot('role_position', 'product_owner')
                ->wherePivot('confidential', 0);
    }

    public function scrumMaster() {
        return $this->belongsToMany('Mom\Models\User', 'mom.person_project', 'project_id', 'individuals_id')
                ->withPivot('role_position')
                ->wherePivot('role_position', 'scrum_master')
                ->wherePivot('confidential', 0);
    }

}
