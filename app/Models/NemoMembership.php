<?php

namespace Mom\Models;

use Illuminate\Database\Eloquent\Model;

class NemoMembership extends Model
{
    protected $table = 'nemo.memberships';
    protected $primaryKey = 'parent_entities_id';
	protected $fillable = [
		'individuals_id',
		'parent_entities_id',
		'role_position',
	];
	public $incrementing = false;

	public function project()
	{
		return $this->belongsTo('Mom\Models\ProjectMeta', 'parent_entities_id');
	}
}
