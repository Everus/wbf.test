<?php


class passwordValidator extends abstractValidator
{
    const MINIMUM_PASSWORD_LEN = 6;

    public function validate($value)
    {
        return (mb_strlen($value) >= self::MINIMUM_PASSWORD_LEN) ? true : false;
    }

}