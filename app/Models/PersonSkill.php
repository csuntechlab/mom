<?php namespace Mom\Models;

use Illuminate\Database\Eloquent\Model;

class PersonSkill extends Model
{
   protected $table = 'mom.person_expertise';
   protected $fillable = [
      'individual_id', 'expertise_id',
   ];
}
