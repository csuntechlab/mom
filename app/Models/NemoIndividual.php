<?php

namespace Mom\Models;

use Illuminate\Database\Eloquent\Model;

class NemoIndividual extends Model 
{
	protected $table = 'nemo.individuals';
	protected $primaryKey = 'individuals_id';
	public $incrementing = false;
}