<?php


class emailValidator extends abstractValidator
{
    /**
     * @param mixed
     * @return boolean
    */
    public function validate($value)
    {
        return (filter_var($value, FILTER_VALIDATE_EMAIL)) ? true : false;
    }
}