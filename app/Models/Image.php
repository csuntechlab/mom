<?php

namespace Mom\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    projected $fillable = [
    	'imageable_id',
    	'imageable_type',
    	'src',
    ];

    public function imageable() {
    	return $this->morphTo();
    }
}
