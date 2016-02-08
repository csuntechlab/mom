<?php namespace Mom\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
   protected $table = 'mom.profiles';
   protected $primaryKey = 'profile_id';
   protected $fillable = [
      'background', 'position', 'grad_date'
   ];

   /**
    * Relates this person to their associated image.
    * 
    * @return Builder
    */
   public function image() {
      return $this->morphOne('Mom\Models\Image', 'imageable');
   }

   /**
    * Relates this person to their associated social networks.
    * 
    * @return Builder
    */
   public function links() {
      return $this->belongsToMany('Mom\Models\Link', 'link_person', 'individuals_id', 'link_id')
        ->withPivot('link_url');
   }

   /**
    * Relates this person to their associated skills.
    * 
    * @return Builder
    */
   public function skills() {
      return $this->belongsToMany('Mom\Models\Skill', 'mom.person_expertise', 'individuals_id', 'expertise_id');
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
