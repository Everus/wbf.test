<?php

class passwordField extends Field
{
    /**
     * passwordField constructor.
     */
    public function __construct()
    {
        $this
            ->setValidator(new passwordValidator())
            ->addArg('type', 'password');
    }
}