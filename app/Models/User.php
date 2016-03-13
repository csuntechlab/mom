<?php namespace Mom\Models;

use METALab\Auth\MetaUser;
use Mom\Models\Profile;

class User extends MetaUser
{
    //protected $table = 'mom.users';
    protected $primaryKey = 'user_id';
    public $incrementing = false;

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
    * Constructs a new User object. This constructor has to be added because
    * this model is subclassed from the MetaUser class and therefore its parent
    * constructor has to be invoked.
    */
   public function __construct() {
      parent::__construct($this->table, $this->primaryKey);
   }

   /**
    * Relates this Person to all its associated Role models.
    *
    * @return Builder
    */
   public function roles() {
      // grab all the roles associated with this person depending on whether they
      // exist in an academic department or they are assigned an application-specific
      // role instead
      return $this->belongsToMany('Mom\Models\Role', 'user_role', 'user_id', 'role_name')
         ->withPivot('parent_entities_id');
   }

   /**
    * Returns the user with the given identifier. This is used primarily by
    * custom authentication service providers.
    *
    * @param string $identifier The identifier to use for retrieval
    * @return User
    */
   public static function findForAuth($identifier) {
      return self::where('user_id', '=', $identifier)->first();
   }

   /**
    * Returns the user with the given identifier and Remember Me token. This
    * is used primarily by custom authentication service providers.
    *
    * @param string $identifier The identifier to use for retrieval
    * @param string $token The token to use for retrieval
    *
    * @return User
    */
   public static function findForAuthToken($identifier, $token) {
      return self::where('user_id', '=', $identifier)
         ->where('remember_token', '=', $token)
         ->first();
   }

   /**
    * Returns whether the person has the specified general role name.
    *
    * @param string $role The system name of the role to check
    * @return boolean
    */
   public function hasRole($role) {
      $roles = $this->roles()->lists('system_name')->toArray();
      return in_array($role, $roles);
   }

   /**
    * Returns whether the person has ANY of the specified roles.
    *
    * @param array $roles An array of system role names to check
    * @return boolean
    */
   public function hasAnyRole($roles) {
      foreach($roles as $role) {
         if($this->hasRole($role))
            return true;
      }

      return false;
   }

    public function profile() {
        return $this->hasOne('Mom\Models\Profile', 'individuals_id');
    }
    
    public function isStudent(){
        return $this->hasRole('student');
    }

    public function hasProfile(){
        return (null !== (Profile::where('individuals_id', $this->user_id)->first()));
    }

    
    public function getProfileIdAttribute(){
        return Profile::where('individuals_id', $this->user_id)->first()->profile_id;
    }
}
