<?php namespace Sharewithme\User\Repositories;
use Sharewithme\User\Models\PasswordReset;
use Sharewithme\User\Repositories\Contracts\ResetPasswordRepositoryInterface;
use Sharewithme\User\Repositories\Abstracts\ResetPasswordAbstract;


class ResetPasswordRepository extends ResetPasswordAbstract  implements ResetPasswordRepositoryInterface {

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