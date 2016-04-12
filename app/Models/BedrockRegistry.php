<?php

namespace Mom\Models;

use Illuminate\Database\Eloquent\Model;

class BedrockRegistry extends Model
{
    protected $table = 'bedrock.registry';
    protected $primaryKey = 'entities_id';
    protected $fillable = [];
}
