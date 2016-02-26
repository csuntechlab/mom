<?php

namespace Mom\Models;

use Illuminate\Database\Eloquent\Model;

class NemoEntity extends Model
{
   protected $table = 'nemo.entities';
   protected $primaryKey = 'entities_id';
   public $incrementing = false;
   protected $fillable = [
      'entities_id', 
      'parent_entities_id', 
      'entity_type',
      'display_name', 
      'description',
   ];
}
