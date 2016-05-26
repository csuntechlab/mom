<?php namespace Mom\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
   protected $table = 'mom.research';
   protected $primaryKey = 'expertise_id';

   public $incrementing = false;
}
