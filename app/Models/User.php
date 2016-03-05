<?php namespace Mom\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    //protected $table = 'mom.users';
    protected $primaryKey = 'user_id';
    public $incrementing = false;

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profile() {
        return $this->hasOne('Mom\Models\Profile', 'individuals_id');
    }
    
    /**
     * Relates this User to all its associated Role models.
     *
     * @return Builder
     */
    public function roles() {
        // grab all the roles associated with this person depending on whether they
        // exist in an academic department or they are assigned an application-specific
        // role instead
        return $this->belongsToMany('Mom\Models\Role', 'nemo.memberships', 'individuals_id', 'role_position')
            ->withPivot('parent_entities_id')
            ->where('individuals_id', $this->user_id)
            ->where(function($q) {
                $q->where('parent_entities_id', 'LIKE', 'departments:%');
                    //->orWhere('parent_entities_id', config('app.application_entity_id'));
            });
    }

    /**
     * Returns whether the person has the specified general role name.
     *
     * @param string $role The system name of the role to check
     * @return boolean
     */
    public function hasRole($role) {
        $roles = $this->roles()->lists('system_name');
        return in_array($role, $roles);
    }
}
