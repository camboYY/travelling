<?php namespace Sharewithme\User\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model {

  protected $fillable = ['first_name', 'last_name', 'date_of_birth', 'place_of_birth', '  '] ;

  public function user () {
    return $this->belongsTo('App\User');
  }
}