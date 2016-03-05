<?php

namespace Mom\Models;

use Illuminate\Database\Eloquent\Model;

class NemoMembership extends Model
{
    protected $table = 'nemo.memberships';
	protected $fillable = [
		'individuals_id',
		'parent_entities_id',
		'role_position',
		'ad_hoc_member',
		'confidential',
		'member_status'
	];
}
