<?php

namespace app\models;
use app\core\Model;

class IndexModel
{
    public function __construct()
    {
        $this->db = Model::C();
    }

    public function getMenuItems()
    {
        return $this->db->Get('menu');
    }

    public function getNews($id = 0)
    {
        if($id > 0) return $this->db->query("SELECT * FROM news WHERE id = '$id'");
        return $this->db->query("SELECT * FROM news ORDER BY itemDate DESC");
    }
    public function addNews($title, $text)
    {
        $now = $this->db->query("SELECT NOW()")->fetch_assoc()['NOW()'];
        $user = $_SESSION['web_user']['userName'];
        return $this->db->query("INSERT INTO news (itemTitle, itemContent, itemDate, itemBy) VALUES ('$title', '$text', '$now', '$user')");
    }
}
