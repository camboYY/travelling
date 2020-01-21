<?php namespace Sharewithme\User\Repositories\Abstracts;

abstract class BaseAbstract {
  public abstract function all ($perPage = null);

  public abstract function get ($id);

  public abstract function edit ($id, $records);

  public abstract function delete ($id);

  public abstract function create ($records);
}