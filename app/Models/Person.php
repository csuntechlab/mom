<?php namespace Mom\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
   protected $table = '';
   protected $primaryKey = 'user_id';
   protected $fillable = [
      'background', 'position', 'grad_year'
   ];

   /**
    * Relates this person to their associated image.
    * 
    * @return Builder
    */
   public function image() {
      return $this->hasOne('Mom\Models\Image');
   }

   /**
    * Relates this person to their associated social networks.
    * 
    * @return Builder
    */
   public function socialNetworks() {
      return $this->belongsToMany('Mom\Models\SocialNetwork', 'Person_SocialNetwork', 'user_id', 'social_id');
   }

   /**
    * Concatenates and returns the full name.
    * 
    * @return string
    */
   public function fullName() {

      if($this->middle_name === null) {
         return $this->first_name . " " . $this->last_name;
      }

      return $this->first_name . " " . $this->middle_name . " " . $this->last_name;
   }

}
