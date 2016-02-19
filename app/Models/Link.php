<?php namespace Mom\Models;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
   protected $table = 'mom.links';
   protected $primaryKey = 'link_id';
   protected $fillable = [
      'logo_src', 'type',
   ];
}
