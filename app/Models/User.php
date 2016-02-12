<?php namespace Mom\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'mom.users';
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
    
}
