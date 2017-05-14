<?php

namespace app\controllers;

use app\core\View;
use app\models;

class UserController
{
    public function __construct()
    {
        $this->view = View::C();
    }

    public function Login()
    {
        if(IsUser()) return $this->view->render('templates/error');
        if(isset($_POST['login-username']) && isset($_POST['login-password']))
        {
            if(strlen($_POST['login-username']) >= 4 || strlen($_POST['login-password']) >= 6)
            {
                $model = new models\UserModel();
                $user = $model->getData($_POST['login-username'], '*')->fetch_assoc();
                if($user['userPwd'] != sha1($_POST['login-password']))
                {
                    $this->view->set('type', 'danger');
                    $this->view->set('message', 'Invalid username or password.');
                    return $this->view->render('components/alert');
                }
                else
                {
                    $_SESSION['web_user'] = $user;
                    $this->view->set('type', 'success');
                    $this->view->set('message', 'You have been logged on. Redirecting..');
                    return $this->view->render('components/alert');
                }
            }
            else
            {
                $this->view->set('type', 'danger');
                $this->view->set('message', 'Username or password too short.');
                return $this->view->render('components/alert');
            }
        }
        else return $this->view->render('templates/error');
    }
    public function Register()
    {
        if(IsUser()) return $this->view->render('templates/error');
        if(isset($_POST['register-username']) && isset($_POST['register-name']) && isset($_POST['register-email']) &&
        isset($_POST['register-password']) && isset($_POST['register-password-1']))
        {
            $model = new models\UserModel();
            if(strlen($_POST['register-username']) < 4)
            {
                $this->view->set('type', 'danger');
                $this->view->set('message', 'Username too short.');
                return $this->view->render('components/alert');
            }
            else
            {
                if($model->getData($_POST['register-username'], 'id')->num_rows > 0)
                {
                    $this->view->set('type', 'danger');
                    $this->view->set('message', 'Username already used.');
                    return $this->view->render('components/alert');
                }
            }
            if(strlen($_POST['register-name']) < 4)
            {
                $this->view->set('type', 'danger');
                $this->view->set('message', 'Display name too short.');
                return $this->view->render('components/alert');
            }
            if(!filter_var($_POST['register-email'], FILTER_VALIDATE_EMAIL))
            {
                $this->view->set('type', 'danger');
                $this->view->set('message', 'Invalid E-Mail format.');
                return $this->view->render('components/alert');
            }
            if(strlen($_POST['register-password']) < 6 || strlen($_POST['register-password-1']) < 6)
            {
                $this->view->set('type', 'danger');
                $this->view->set('message', 'Password too short.');
                return $this->view->render('components/alert');
            }
            if($_POST['register-password'] != $_POST['register-password-1'])
            {
                $this->view->set('type', 'danger');
                $this->view->set('message', 'Passwords do not match.');
                return $this->view->render('components/alert');
            }
            if($model->addUser($_POST['register-username'], $_POST['register-name'], sha1($_POST['register-password']), $_POST['register-email']))
            {
                $user = $_POST['register-username'];
                SendMail($_POST['register-email'], 'Account registration', "<h3>Hello, $user!</h3><br>Thank you for registration, hope you enjoy our services. Your Geam. :)");
                $this->view->set('type', 'success');
                $this->view->set('message', 'You have been registered. Please Log in.');
                return $this->view->render('components/alert');
            }
            else
            {
                $this->view->set('type', 'danger');
                $this->view->set('message', 'Internal error. Try again later.');
                return $this->view->render('components/alert');
            }
        }
        return $this->view->render('templates/error');
    }
    public function Restore()
    {
        if(IsUser()) return $this->view->render('templates/error');
        if(isset($_POST['restore-username']) && isset($_POST['restore-email']))
        {
            if(strlen($_POST['restore-username']) < 4)
            {
                $this->view->set('type', 'danger');
                $this->view->set('message', 'Username too short');
                return $this->view->render('components/alert');
            }
            if(!filter_var($_POST['restore-email'], FILTER_VALIDATE_EMAIL))
            {
                $this->view->set('type', 'danger');
                $this->view->set('message', 'Invalid E-Mail format.');
                return $this->view->render('components/alert');
            }
            $model = new models\UserModel();
            if($model->getData($_POST['restore-username'], 'userEmail')->fetch_assoc()['userEmail'] == $_POST['restore-email'])
            {
                $pwd = GenerateWord();
                if($model->setUser($_POST['restore-username'], 'userPwd', sha1($pwd)))
                {
                    $user = $_POST['restore-username'];
                    if(SendMail($_POST['restore-email'], 'Password recovery request', "<h3>Hello, $user.</h3><br>Seems like you forgot password.<br>New password: <b>$pwd</b><br>"))
                    {
                        $this->view->set('type', 'success');
                        $this->view->set('message', 'Password sent to email.');
                        return $this->view->render('components/alert');
                    }
                }
                else
                {
                    $this->view->set('type', 'danger');
                    $this->view->set('message', 'Database error occurred. Try again later.');
                    return $this->view->render('components/alert');
                }
            }
            else
            {
                $this->view->set('type', 'danger');
                $this->view->set('message', 'Username and email do not match.');
                return $this->view->render('components/alert');
            }
        }
        return $this->view->render('templates/error');
    }
    public function Logout()
    {
        if(!IsUser()) return $this->view->render('templates/error');
        unset($_SESSION['web_user']);
        return header('Location: /');
    }
    public function changePassword()
    {
        if(!IsUser()) return $this->view->render('templates/error');
        if(isset($_POST['old-pwd']) && isset($_POST['new-pwd-1']) && isset($_POST['new-pwd-1']))
        {
            if(strlen($_POST['old-pwd']) < 6 || strlen($_POST['new-pwd-1']) < 6 || strlen($_POST['new-pwd-2']) < 6)
            {
                $this->view->set('type', 'danger');
                $this->view->set('message', 'Seems like password too short.');
                return $this->view->render('components/alert');
            }
            if(sha1($_POST['old-pwd']) != $_SESSION['web_user']['userPwd'])
            {
                $this->view->set('type', 'danger');
                $this->view->set('message', 'Old password is wrong.');
                return $this->view->render('components/alert');
            }
            if ($_POST['new-pwd-1'] != $_POST['new-pwd-2'])
            {
                $this->view->set('type', 'danger');
                $this->view->set('message', 'Passwords does not match.');
                return $this->view->render('components/alert');
            }
            if($_POST['old-pwd'] == $_POST['new-pwd-1'])
            {
                $this->view->set('type', 'danger');
                $this->view->set('message', 'Please, use another password.');
                return $this->view->render('components/alert');
            }
            $model = new models\UserModel();
            if ($model->setUser($_SESSION['web_user']['userName'], 'userPwd', sha1($_POST['new-pwd-1'])))
            {
                $user = $_SESSION['web_user']['userName'];
                $email = $_SESSION['web_user']['userEmail'];
                SendMail($email, 'Account password changed', "<h3>Hello, $user.</h3><br>Seems like your account password changed. In touch with you, Geam. :)");
                $_SESSION['web_user']['userPwd'] = sha1($_POST['new-pwd-1']);
                $this->view->set('type', 'success');
                $this->view->set('message', 'Password successfully changed.');
                return $this->view->render('components/alert');
            }
            else
            {
                $this->view->set('type', 'danger');
                $this->view->set('message', 'Error changing password, try again later.');
                return $this->view->render('components/alert');
            }
        }
        return $this->view->render('templates/error');
    }
    public function changeEmail()
    {
        if(!IsUser()) return $this->view->render('templates/error');
        if(isset($_POST['password']) && isset($_POST['email']))
        {
            $email = $_POST['email'];
            if(strlen($_POST['password']) < 6)
            {
                $this->view->set('type', 'danger');
                $this->view->set('message', 'Seems like password too short.');
                return $this->view->render('components/alert');
            }
            if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                $this->view->set('type', 'danger');
                $this->view->set('message', 'Please enter valid E-Mail address.');
                return $this->view->render('components/alert');
            }
            $model = new models\UserModel();
            if(sha1($_POST['password']) != $_SESSION['web_user']['userPwd'])
            {
                $this->view->set('type', 'danger');
                $this->view->set('message', 'Account password is wrong.');
                return $this->view->render('components/alert');
            }
            $old = $model->getData($_SESSION['web_user']['userName'], 'userEmail')->fetch_assoc();
            if($model->setUser($_SESSION['web_user']['userName'], 'userEmail', $email))
            {
                $_SESSION['web_user']['userEmail'] = $email;
                $user = $_SESSION['web_user']['userName'];
                SendMail($old['userEmail'], 'Account email changed', "<h3>Hello, $user.</h3><br>Seems like your account email changed. In touch with you, Geam. :)");
                $this->view->set('type', 'success');
                $this->view->set('message', 'Email successfully changed.');
                return $this->view->render('components/alert');
            }
            else
            {
                $this->view->set('type', 'danger');
                $this->view->set('message', 'Error changing email, try again later.');
                return $this->view->render('components/alert');
            }
        }
        return $this->view->render('templates/error');
    }
}