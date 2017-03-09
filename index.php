<?
    // Основные вызовы
    session_start();

    require_once('app/brain/functions.php');
    require_once('vendor/autoload.php');
    use ovl\app\brain\Router;

    $app = Router::C();

    // Настройки приложения
    define('BASE', __DIR__);

    // Пути
    $app->add('/', 'ViewController#index');
    $app->add('/news', 'ViewController#news');
    $app->add('/user', 'ViewController#user');

    // Сервисы
    $app->add('/user/login', 'APIController#userLogin');
    $app->add('/user/register', 'APIController#userRegister');
    $app->add('/user/restore', 'APIController#userRestore');


    $app->deploy();
?>