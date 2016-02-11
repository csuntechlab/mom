<?php namespace Helix\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
   protected $table = 'mom.images';
   protected $primaryKey = 'image_id';
   protected $fillable = ['imageable_id', 'imageable_type', 'src'];

   /**
    * Returns the model instance to which this image is morphed.
    * 
    * @return Person|Project
    */
   public function imageable() {
      return $this->morphTo();
   }
   
}
