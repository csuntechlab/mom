<?php namespace Mom\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
  protected $table = 'mom.profiles';
  protected $primaryKey = 'individuals_id';
  protected $fillable = [
    'background', 'position', 'grad_date'
  ];
  public $incrementing = false;

  /**
  * Relates this person to their associated image.
  * 
  * @return Builder
  */
  public function image() {
    return $this->hasOne('Mom\Models\Image', 'imageable_id');
  }

  /**
  * Relates this person to their associated social networks.
  * 
  * @return Builder
  */
  public function links() {
        return $this->belongsToMany('Mom\Models\Link', 'link_entity', 'entities_id', 'link_id')
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

  /*
  * Relates this person to their experience
  *
  */
  public function experience() {
    return $this->hasMany('Mom\Models\ProfileExperience', 'individuals_id');
  }

  /**
  * Returns the full name of the person.
  *
  * @return String
  */
  public function fullName() {
      return User::where('user_id', $this->individuals_id)->value('display_name');
  }


}
