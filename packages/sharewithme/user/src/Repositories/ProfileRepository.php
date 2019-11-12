<?php namespace Sharewithme\User\Repositories;
use App\Modules\User\Models\Profile;
class ProfileRepository extends ProfileRepositoryInterface {

  protected $profile;

  public function __construct ( Profile $profile ) {
    $this->profile = $profile;
  }

  public function get($profileId) {
    return $this->profile->find($profileId);
  }

  public function all () {
    return $this->profile->all();
  }

  public function  delete ( $profileId ) {
    return $this->profile->destroy($profileId);
  }

  public function update ($profileId, array $profiles) {
    return $this->profile->find($profileId)->update($profiles);
  }

  public function create ( array $profiles ) {
    return $this->profile->create($profiles);
  }
}