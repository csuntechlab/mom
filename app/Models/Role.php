<?php namespace Mom\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {
	protected $fillable = [];
	protected $primaryKey = "system_name";

	// this must be set for models that do not use an auto-incrementing PK
	public $incrementing = false;
}