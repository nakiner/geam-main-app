<?php

namespace app\controllers;

use app\core\View;

class ViewController
{
    public function __construct()
    {
        $this->view = View::C();
    }

    public function index()
    {
        $this->view->set('title', 'Index');
        $this->view->set('component', 'pages/index');
        return $this->view->renderPage();
    }

    public function news($id = ['news' => 0])
    {
        $this->view->set('news_id', $id['news']);
        $this->view->set('title', 'News');
        $this->view->set('component', 'pages/news');
        return $this->view->renderPage();
    }

    public function user()
    {
        if(!IsUser()) return $this->view->render('templates/error');
        $this->view->set('title', 'Account');
        $this->view->set('component', 'pages/user');
        return $this->view->renderPage();
    }
}
