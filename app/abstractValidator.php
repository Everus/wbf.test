<?php


abstract class abstractValidator
{
    protected $errors;

    /**
     * @return mixed
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * @param mixed $errors
     * @return abstractValidator
     */
    public function setErrors($errors)
    {
        $this->errors = $errors;
        return $this;
    }
    /**
     * @param mixed
     * @return boolean
    */
    public abstract function validate($value);
}