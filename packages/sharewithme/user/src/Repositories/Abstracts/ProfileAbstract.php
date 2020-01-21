<?php namespace Sharewithme\User\Repositories\Abstracts;

abstract class ProfileAbstract {
      /**
     * Get's a Profile by it's ID
     *
     * @param profileId int
     */
    public abstract function get($profileId);

    /**
     * Get's all Profiles.
     *
     * @return mixed
     */
    public abstract function all($perPage = null);

    /**
     * Deletes a Profile.
     *
     * @param profileId int
     */
    public abstract function delete( $profileId );

    /**
     * Updates a profile.
     *
     * @param profileId int
     * @param profiles array
     */
    public abstract function edit($profileId, array $profiles);

    /**
     * create a profile.
     *
     * @param profiles array
     */
    public  abstract function create(array $profiles);
}