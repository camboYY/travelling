<?php namespace Sharewithme\User\Models;
use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
  const UPDATED_AT = null;

    protected $fillable = [
        'phone_number', 'code', 'email'
    ];

    public function user () {
      return $this->belongsTo('App\User', 'phone_number');
    }
}
