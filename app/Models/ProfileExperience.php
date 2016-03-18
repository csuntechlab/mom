<?php

namespace Mom\Models;

use Illuminate\Database\Eloquent\Model;

class ProfileExperience extends Model
{
    protected $table = 'mom.person_experience';

    protected $fillable = [
    	'experience',
    	'individuals_id'
    ];	

    public function profile()
    {
    	return $this->belongsTo('Mom\Models\Profile');
    }
}
