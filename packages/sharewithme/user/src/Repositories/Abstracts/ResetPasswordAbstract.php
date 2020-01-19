<?php 
namespace Sharewithme\User\Repositories\Abstracts;

abstract class ResetPasswordAbstract {

  abstract function reset($records);

  abstract function get ($phoneNumber);

  abstract function verify ($code);


}


?>