<?php


class userForm extends Form
{
    private $user;

    /**
     * userForm constructor.
     * @param $user
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     * @return userForm
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

    public function bind($request) {
        $request->getData();
        $this->user->setData($request);
    }

}