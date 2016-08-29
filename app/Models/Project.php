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
        'sponsor',
        'position',
    ];

    // formatted as Carbon instances on database in order to use ->format('Y-m-d') in views.
    protected $dates = [
        'created_at',
        'updated_at',
        'start_date',
        'end_date',
    ];

    public function image()
    {
        return $this->hasOne('Mom\Models\Image', 'imageable_id');
    }

    public function meta() {
        return $this->hasOne('Mom\Models\ProjectMeta', 'project_id');
    }

    public function metaProjectShow() {
        return $this->meta()->where('confidential','=', 0);
    }

       // results in a "problem", se examples below
    public function available_videos() {
        return $this->videos()->where('available','=', 1);
    }


    public function link() {
        return $this->hasOne('Mom\Models\LinkEntity', 'entities_id', 'project_id');
    }

    public function members() {
        return $this->belongsToMany('Mom\Models\User', 'nemo.memberships', 'parent_entities_id', 'individuals_id')
                ->withPivot('role_position')
                ->wherePivot('role_position', 'member')
                ->wherePivot('confidential', 0);
    }

    public function productOwner() {
        return $this->belongsToMany('Mom\Models\User', 'nemo.memberships', 'parent_entities_id', 'individuals_id')
                ->withPivot('role_position')
                ->wherePivot('role_position', 'product_owner')
                ->wherePivot('confidential', 0);
    }

    public function scrumMaster() {
        return $this->belongsToMany('Mom\Models\User', 'nemo.memberships', 'parent_entities_id', 'individuals_id')
                ->withPivot('role_position')
                ->wherePivot('role_position', 'scrum_master')
                ->wherePivot('confidential', 0);
    }

}
