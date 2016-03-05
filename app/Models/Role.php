<?php

namespace Mom\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'mom.roles';
    protected $primaryKey = 'system_name';
    public $incrementing = false;
    //protected $fillable = [];

    public function user() {
		return $this->belongsToMany('Mom\Models\User');
	}
}
