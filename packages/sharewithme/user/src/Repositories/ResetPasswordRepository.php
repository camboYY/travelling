<?php namespace Sharewithme\User\Repositories;
use Sharewithme\User\Models\PasswordReset;

class ResetPasswordRepository implements ResetPasswordRepositoryInterface {

  protected $passwordReset;

  public function __construct( PasswordReset $passwordreset) {
    $this->passwordReset = $passwordreset;
  }

  public function reset ( $records) {
    return $this->passwordReset->create($records);
  }

  public function get ($phoneNumber) {
    return $this->passwordReset->find($phoneNumber);
  }

  public function verify ($code) {
    return $this->passwordReset->where('code', $code)->first();
  }
}