<?php

class userController extends Controller
{
    public function newUserAction()
    {
        $request = $this->get('request');
        $user = new User;
        $userForm = new UserForm($user);
        if($request->getMethod() === 'POST') {
            $userForm->bind($request);
            if($userForm->validate()) {
                $user->save();
                return $this->redirect($this->generateUrl('login'));
            }
        }
        $context = array(
            'form' => $userForm,
        );
        return $this->render('', $context);
    }

    public function showAction($user_id)
    {
        $user_rep = $this->get('userRepository');
        $user = $user_rep->findById($user_id);
        if($user)
        {
            return $this->render('userProfile', array('user'=>$user));
        } else {
            return $this->redirect($this->generateURL('userNotFound'));
        }
    }


    public function selfShowAction()
    {
        $security = $this->get('security');
        if($security->hasRole('user'))
        {
            $user_id = $security->getUserID();
            return $this->showAction($user_id);
        } else {
            return $this->redirect($this->generateURL('registration'));
        }
    }
}