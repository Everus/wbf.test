<?php


class emailField extends Field
{


    /**
     * emailField constructor.
     */
    public function __construct()
    {
        $this
            ->setValidator(new emailValidator())
            ->addArg('type', 'email');
    }
}