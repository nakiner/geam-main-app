<?php

namespace ovl\app\brain;

class Router
{
    private $urls;
    private static $obj;

    public static function C()
    {
        if (empty(self::$obj)) self::$obj = new self();
        return self::$obj;
    }

    public function add($url, $met)
    {
        $this->urls[$url] = $met;
    }
    public function deploy()
    {
        foreach ($this->urls as $url => $action)
        {
            if ($url == $_SERVER['REQUEST_URI'])
            {
                if (is_callable($action)) return $action();
                $controller = 'ovl\\app\\controllers\\' . explode('#', $action)[0];
                $method = explode('#', $action)[1];
                return (new $controller)->$method();
            }
            else
            {
                $sURL = explode('/', $url);
                $cURL = explode('/', $_SERVER['REQUEST_URI']);
                $c = count($sURL);
                if($c > 2 && $c == count($cURL))
                {
                    $ids = [];
                    $ok = true;
                    for ($i = 1; $i < $c; ++$i)
                    {
                        if($sURL[$i] == '%id' && $sURL[$i-1] == $cURL[$i-1]) $ids[$sURL[$i - 1]] = $cURL[$i];
                        else if($sURL[$i] == '%id' && $sURL[$i-1] != $cURL[$i-1] || $sURL[$i] != '%id' && $sURL[$i] != $cURL[$i]) $ok = false;
                    }
                    if($ok)
                    {
                        if (is_callable($action)) return $action($ids);
                        $controller = 'ovl\\app\\controllers\\' . explode('#', $action)[0];
                        $method = explode('#', $action)[1];
                        return (new $controller)->$method($ids);
                    }
                }
            }
        }
        return View::C()->render('Main/Error');
    }
}
