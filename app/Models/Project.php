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

    // 
    protected $appends = [
        'project_link',
        'product_owner',
        'scrum_master',
    ];

    public function meta() {
        return $this->hasOne('Mom\Models\ProjectMeta', 'project_id');
    }

    public function members() {
        return $this->belongsToMany('Mom\Models\User', 'nemo.memberships', 'parent_entities_id', 'individuals_id')
                ->withPivot('role_position')
                ->wherePivot('role_position', 'member');
    }

    public function productOwners() {
        return $this->belongsToMany('Mom\Models\User', 'nemo.memberships', 'parent_entities_id', 'individuals_id')
                ->withPivot('role_position')
                ->wherePivot('role_position', 'product_owner');
    }

    public function scrumMasters() {
        return $this->belongsToMany('Mom\Models\User', 'nemo.memberships', 'parent_entities_id', 'individuals_id')
                ->withPivot('role_position')
                ->wherePivot('role_position', 'scrum_master');
    }

    public function projectLinks() {
        return $this->belongsToMany('Mom\Models\Link', 'link_entity', 'entities_id', 'link_id')
                ->withPivot('link_url');
    }

    public function getProjectLinkAttribute() {
        return $this->projectLinks->first() ?: new Link;
    }

    public function getProductOwnerAttribute(){
        return $this->productOwners->first() ?: new User;
    }

    public function getScrumMasterAttribute(){
        return $this->scrumMasters->first() ?: new User;
    }
}
