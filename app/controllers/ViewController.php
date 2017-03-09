<?php

namespace ovl\app\controllers;

use ovl\app\brain\View;

class ViewController
{
    public function __construct()
    {
        $this->view = View::C();
    }

    public function index()
    {
        $this->view->set('title', 'Ovl - Main');
        $this->view->render('Pages/index/index');
    }

    public function news()
    {
        $this->view->set('title', 'Ovl - News');
        $this->view->render('Pages/news/index');
    }

    public function user()
    {
        $this->view->set('title', 'Ovl - Account');
        $this->view->render('Pages/user/index');
        unset($_SESSION['ovl_user']);
    }
}
