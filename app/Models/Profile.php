<?php namespace Mom\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
  protected $table = 'mom.profiles';
  protected $primaryKey = 'individuals_id';
  public $incrementing = false;
  
  protected $appends = [
    'display_name',
    'confidential'
  ];
  
  protected $fillable = [
    'individuals_id',
    'background',
    'position',
    'grad_date'
  ];

  protected $hidden = [
    'created_at',
    'updated_at'
  ];

  /**
  * Relates this person to their associated image.
  * 
  * @return Builder
  */
  public function image() {
    return $this->hasOne('Mom\Models\Image', 'imageable_id')
    ->where('imageable_type', get_class($this));
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
    return $this->belongsToMany('Mom\Models\Skill', 'mom.person_expertise', 'entities_id', 'expertise_id');
  }

  /*
  * Relates this person to their experience
  *
  */
  public function experience() {
    return $this->hasMany('Mom\Models\ProfileExperience', 'individuals_id');
  }

  /**
  * Returns the custom data attribute for display name of the person.
  * @return String the display name of the individual
  */
  public function getDisplayNameAttribute() {
      return User::find($this->individuals_id)->display_name;
  }

  /**
   * Builds the custom data attribute for the confidential flag
   * @return Integer the value of true 1 or false 0
   */
  public function getConfidentialAttribute() {
    return User::find($this->individuals_id)->confidential;
  }

  /**
  * Many to many relationship between Profile and Project models
  * @return Builder
  */
  public function projects() {
    return $this->hasMany('Mom\Models\NemoMembership', 'individuals_id')
    ->where('parent_entities_id', 'LIKE', 'projects-mom:%');
  }

  public function filteredProjects()
  {
    $members = $this->projects->where('role_position', 'member');
    $POandSM = $this->projects->whereIn('role_position', ['product_owner', 'scrum_master']);

    return $members->merge($POandSM);
  }

}