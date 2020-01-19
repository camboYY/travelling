<?php

namespace Sharewithme\User\Exceptions;


use InvalidArgumentException;


class PhoneAlreadyExists extends InvalidArgumentException
{
    public static function create(string $phoneNumber)
    {
        return new static("A phone number `{$phoneNumber}` already exists.");
    }
}
