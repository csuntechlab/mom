<?php namespace Helix\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
   protected $table = '';
   protected $primarKey = 'image';
   protected $fillable = ['owner_id', 'src'];

   /**
    * Relates this image to its associated person.
    * 
    * @return Builder
    */
   public function person() {
      return $this->belongsTo('Helix\Models\Person');
   }
}
