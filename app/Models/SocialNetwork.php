<?php namespace Mom\Models;

use Illuminate\Database\Eloquent\Model;

class SocialNetwork extends Model
{
   protected $table = '';
   protected $primaryKey = '';
   protected $fillable = [
      'logo', 'name'
   ];

   /**
    * Relates this Social Network to all its associated persons/people.
    * 
    * @return Builder
    */
   public function people() {
      return $this->belongsToMany('Mom\Models\Person', 'Person_SocialNetwork', 'social_id', 'user_id');
   }

}
