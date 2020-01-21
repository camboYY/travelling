<?php namespace Sharewithme\User\Repositories\Contracts;

interface BaseRepositoryInterface {
  public function all ($perPage = null);

  public function get ($id);

  public function edit ($id, $records);

  public function delete ($id);

  public function create ($records);
}