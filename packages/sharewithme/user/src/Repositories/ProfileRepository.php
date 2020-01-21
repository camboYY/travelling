<?php namespace Sharewithme\User\Repositories;
use Sharewithme\User\Models\Profile;
use Sharewithme\User\Repositories\Abstracts\ProfileAbstract;
use Sharewithme\User\Repositories\Contracts\ProfileRepositoryInterface;

class ProfileRepository extends ProfileAbstract implements ProfileRepositoryInterface {

  protected $profile;

  public function __construct ( Profile  $profile ) {
    $this->profile = $profile;
  }

  public function get($profileId) {
    return $this->profile->find($profileId);
  }

  public function all ($perPage =  null) {
    return $this->profile->paginate($perPage);
  }

  public function  delete ( $profileId ) {
    return $this->profile->delete($profileId);
  }

  public function update ($profileId, array $profiles) {
     if ($this->profile->find($profileId)->edit($profiles)) {
       return $this->profile->find($profileId);
     }
  }

  public function create ( array $profiles ) {
    return $this->profile->create($profiles);
  }
}