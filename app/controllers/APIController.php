<?php

namespace ovl\app\controllers;

use ovl\app\brain\View;
use ovl\app\models;

class APIController
{
    public function userLogin()
    {
        $view = View::C();
        if(isset($_POST['login-username']) && isset($_POST['login-password']))
        {
            if(strlen($_POST['login-username']) >= 4 || strlen($_POST['login-password']) >= 6)
            {
                $model = new models\UserModel();
                $user = $model->getUser($_POST['login-username'], sha1($_POST['login-password']));
                if($user->num_rows < 1)
                {
                    $view->set('type', 'danger');
                    $view->set('message', 'Invalid username or password.');
                    return $view->render('Components/Alert');
                }
                else
                {
                    $_SESSION['ovl_user'] = $user->fetch_assoc();
                    $view->set('type', 'success');
                    $view->set('message', 'Success. Refresh the page.');
                    return $view->render('Components/Alert');
                }
            }
            else
            {
                $view->set('type', 'danger');
                $view->set('message', 'Username or password too short.');
                return $view->render('Components/Alert');
            }
        }
        else return $view->render('Main/Error');
    }
    public function userRegister()
    {
        $view = View::C();
        if(isset($_POST['register-username']) && isset($_POST['register-name']) && isset($_POST['register-email']) &&
        isset($_POST['register-password']) && isset($_POST['register-password-1']))
        {
            $model = new models\UserModel();
            if(strlen($_POST['register-username']) < 4)
            {
                $view->set('type', 'danger');
                $view->set('message', 'Username too short.');
                return $view->render('Components/Alert');
            }
            else
            {
                if($model->checkUser($_POST['register-username'])->num_rows > 0)
                {
                    $view->set('type', 'danger');
                    $view->set('message', 'Username already in use.');
                    return $view->render('Components/Alert');
                }
            }
            if(strlen($_POST['register-name']) < 4)
            {
                $view->set('type', 'danger');
                $view->set('message', 'Display name too short.');
                return $view->render('Components/Alert');
            }
            if(!filter_var($_POST['register-email'], FILTER_VALIDATE_EMAIL))
            {
                $view->set('type', 'danger');
                $view->set('message', 'Invalid E-Mail format.');
                return $view->render('Components/Alert');
            }
            if(strlen($_POST['register-password']) < 6 || strlen($_POST['register-password-1']) < 6)
            {
                $view->set('type', 'danger');
                $view->set('message', 'Password too short.');
                return $view->render('Components/Alert');
            }
            if($_POST['register-password'] != $_POST['register-password-1'])
            {
                $view->set('type', 'danger');
                $view->set('message', 'Passwords do not match.');
                return $view->render('Components/Alert');
            }
            if($model->addUser($_POST['register-username'], $_POST['register-name'], sha1($_POST['register-password']), $_POST['register-email']))
            {
                $view->set('type', 'success');
                $view->set('message', 'You have been registered. Please Log in.');
                return $view->render('Components/Alert');
            }
            else
            {
                $view->set('type', 'danger');
                $view->set('message', 'Internal error. Try again later.');
                return $view->render('Components/Alert');
            }
        }
        return $view->render('Main/Error');

    }
    public function userRestore()
    {
        $view = View::C();
        if(isset($_POST['restore-username']) && isset($_POST['restore-email']))
        {
            if(strlen($_POST['restore-username']) < 4)
            {
                $view->set('type', 'danger');
                $view->set('message', 'Username too short');
                return $view->render('Components/Alert');
            }
            if(!filter_var($_POST['restore-email'], FILTER_VALIDATE_EMAIL))
            {
                $view->set('type', 'danger');
                $view->set('message', 'Invalid E-Mail format.');
                return $view->render('Components/Alert');
            }
            $model = new models\UserModel();
            if($model->checkEmail($_POST['restore-username'], $_POST['restore-email'])->num_rows > 0)
            {
                $view->set('type', 'success');
                $view->set('message', 'Password sent to email.');
                return $view->render('Components/Alert');
            }
            else
            {
                $view->set('type', 'danger');
                $view->set('message', 'Failed to send email.');
                return $view->render('Components/Alert');
            }
        }
        else return $view->render('Main/Error');
    }
}