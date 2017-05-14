<?
    // Основные вызовы
    session_start();

    require_once('../app/core/functions.php');
    require_once('../vendor/autoload.php');

    $app = \app\core\Router::C();

    // Настройки приложения
    define('BASE', dirname(__DIR__));
    define('ROOT','/web');

    // Пути
    $app->add('/', 'ViewController#index');
    $app->add('/user', 'ViewController#user');
    $app->add('/news', 'ViewController#news');
    $app->add('/news/%id', 'ViewController#news');

    $app->add('/news/action/add', 'NewsController#newsAdd');
    //$app->add('/news/action/edit', 'NewsController#newsEdit');

    // Сервисы
    $app->add('/user/login', 'UserController#Login');
    $app->add('/user/register', 'UserController#Register');
    $app->add('/user/restore', 'UserController#Restore');
    $app->add('/user/logout', 'UserController#Logout');
    $app->add('/user/change/password', 'UserController#changePassword');
    $app->add('/user/change/email', 'UserController#changeEmail');

    $app->deploy();
?>