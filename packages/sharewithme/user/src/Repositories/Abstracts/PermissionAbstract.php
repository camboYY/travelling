<?php namespace Sharewithme\User\Repositories\Abstracts;

use Spatie\Permission\Models\Permission;

abstract class PermissionAbstract extends BaseAbstract {
  
  protected $permission;

  public function __construct (Permission $permission) {
    $this->permission = $permission;
  }
}