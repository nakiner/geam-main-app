<?php

namespace app\controllers;

use app\core\View;
use app\models\IndexModel;

class NewsController
{
    public function __construct()
    {
        $this->view = View::C();
    }

    public function newsAdd()
    {
        if(isset($_POST['news-title']) && isset($_POST['news-text']))
        {
            $model = new IndexModel();
            $title = $_POST['news-title'];
            $text = $_POST['news-text'];
            if(strlen($text) < 10 || strlen($title) < 6)
            {
                $this->view->set('type', 'danger');
                $this->view->set('message', 'Title or text too short.');
                return $this->view->render('components/alert');
            }
            if($model->addNews($title, $text))
            {
                $this->view->set('type', 'success');
                $this->view->set('message', 'News added successfully.');
                return $this->view->render('components/alert');
            }
            else
            {
                $this->view->set('type', 'danger');
                $this->view->set('message', 'Internal server error. Try again later.');
                return $this->view->render('components/alert');
            }

        }
        else
        {
            $this->view->set('title', 'Add news');
            $this->view->set('component', 'components/news-form-add');
            return $this->view->renderPage();
        }
    }

    public function newsEdit()
    {

    }
}