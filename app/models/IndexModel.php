<?php

namespace ovl\app\models;
use ovl\app\brain\Model;

class IndexModel
{
    public function __construct()
    {
        $this->db = Model::C();
    }

    public function getMenuItems()
    {
        return $this->db->Get('ovl_menu');
    }

    public function getNews()
    {
        return $this->db->query("SELECT * FROM ovl_news ORDER BY itemDate DESC");
    }
}
