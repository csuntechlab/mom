<?php namespace Mom\Models;

use Illuminate\Database\Eloquent\Model;

class ProfileSkill extends Model
{
   protected $table = 'mom.person_expertise';
   protected $fillable = [
      'individuals_id', 'expertise_id',
   ];
}
