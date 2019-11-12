<?php namespace Sharewithme\User\Models;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model {

  protected $fillable = [] ;

  public function user () {
    return $this->belongsTo('App\User');
  }
}