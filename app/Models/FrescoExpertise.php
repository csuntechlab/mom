<?php

namespace Mom\Models;

use Illuminate\Database\Eloquent\Model;

class FrescoExpertise extends Model
{
    protected $table = 'fresco.expertise_entity';
    protected $fillable = [
    	'expertise_id',
    	'entities_id'
    ];
}
