<?php namespace Sharewithme\User\Repositories\Contracts;

interface ResetPasswordRepositoryInterface {
      /**ResetPasswordRepositoryInterface
     * Reset password via phone number
     *
     * @param records array
     */
    public function reset( $records);

    public function get ($phoneNumber);

    public function verify ($code);
}