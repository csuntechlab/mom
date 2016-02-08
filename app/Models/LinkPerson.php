<?php namespace Mom\Models;

use Illuminate\Database\Eloquent\Model;

class LinkPerson extends Model
{
   protected $table = 'mom.link_person';
   protected $primaryKey = 'link_person_id';
   protected $fillable = [
      'individuals_id', 'link_id', 'link_url'
   ];
}
