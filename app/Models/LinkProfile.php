<?php namespace Mom\Models;

use Illuminate\Database\Eloquent\Model;

class LinkProfile extends Model
{
   protected $table = 'mom.link_profile';
   protected $primaryKey = 'link_profile_id';
   protected $fillable = [
      'individuals_id', 'link_id', 'link_url'
   ];

   // Get the profile's link
   public function scopeLink($q, $id, $link_id)
   {
   		return $q->where('individuals_id', $id)->where('link_id', $link_id)->first();
   }
}