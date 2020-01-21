<?php namespace Sharewithme\User\Repositories\Abstracts;

use Spatie\Permission\Models\Role;

abstract class RoleAbstract extends BaseAbstract {

  protected $role;

  public function __construct (Role $role) {
    $this->role = $role;
  }

}