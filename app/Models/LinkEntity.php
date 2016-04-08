<?php

namespace Mom\Models;

use Illuminate\Database\Eloquent\Model;

class LinkEntity extends Model
{
    protected $table = 'mom.link_entity';
    protected $fillable = [
    	'entities_id', 
    	'link_id', 
    	'link_url',
    ];
}
