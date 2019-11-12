<?php namespace Sharewithme\User\Repositories;

interface ProfileRepositoryInterface {
      /**
     * Get's a Profile by it's ID
     *
     * @param profileId int
     */
    public function get($profileId);

    /**
     * Get's all Profiles.
     *
     * @return mixed
     */
    public function all();

    /**
     * Deletes a Profile.
     *
     * @param profileId int
     */
    public function delete( $profileId );

    /**
     * Updates a profile.
     *
     * @param profileId int
     * @param profiles array
     */
    public function update($profileId, array $profiles);

    /**
     * create a profile.
     *
     * @param profiles array
     */
    public function create(array $profiles);
}