<?php namespace Mom\Models;

use Illuminate\Database\Eloquent\Model;

class LinkPerson extends Model
{
   protected $table = 'mom.link_profile';
   protected $primaryKey = 'link_profile_id';
   protected $fillable = [
      'individuals_id', 'link_id', 'link_url'
   ];
}
