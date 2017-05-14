<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no">
        <meta name="theme-color" content="#455a64">
        <title><? echo $this->data['title']; ?></title>
    </head>
    <body>
        <header>
            <nav class="navbar navbar-toggleable-md navbar-inverse bg-navbar fixed-top">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#menuList" aria-controls="menuList" aria-expanded="false" aria-label="Toggle">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand">
                    <img src="<?=ROOT?>/img/mini.png" width="30" height="30" alt="">
                </a>
                <div class="collapse navbar-collapse" id="menuList">
                    <ul class="navbar-nav">
                        <?
                        $res = new \app\models\IndexModel();
                        $res = $res->getMenuItems();
                        foreach($res as $curr => $key)
                        {
                            //if($_SERVER['REQUEST_URI'] == $key['link']) echo("<li class=\"nav-item active\"> <a class=\"nav-link\" href=\"$key[link]\">$key[name]</a></li>");
                            echo("<li class=\"nav-item\"> <a class=\"nav-link\" href=\"$key[itemLink]\">$key[itemName]</a></li>");
                        }
                        if(!isset($_SESSION['web_user']) || empty($_SESSION['web_user'])) echo '<li class="nav-item"><a class="nav-link" data-toggle="modal" data-target="#popup" href="">Account</a></li>';
                        else
                        {
                            $usr = $_SESSION['web_user']['userName'];
                            echo
                            ("
                                <li class=\"nav-item dropdown\">
                                    <a class=\"nav-link dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">Hello, $usr</a>
                                    <div class=\"dropdown-menu\">
                                        <a class=\"dropdown-item\" href=\"/news/action/add\">Add News</a>
                                        <a class=\"dropdown-item\" href=\"/user\">Manage account</a>
                                        <a class=\"dropdown-item\" href=\"/user/logout\">Logout</a>
                                    </div>
                                </li>
                            ");
                        }
                        ?>
                    </ul>
                </div>
            </nav>
        </header>
        <br/><br/><br/>
        <div class="container">
            <? if(isset($this->data['component'])) $this->render($this->data['component']); ?>
        </div>
        <br/><br/>
        <footer class="navbar navbar-inverse bg-navbar fixed-bottom text-center">
            <div>
                <span class="text-white"><b>Copyright nakiner</b></span>
            </div>
        </footer>
    </body>
</html>
<link rel="stylesheet" href="<?=ROOT?>/css/bootstrap.min.css">
<link rel="stylesheet" href="<?=ROOT?>/css/override.css">
<script src="<?=ROOT?>/js/jquery-3.1.1.min.js"></script>
<script src="<?=ROOT?>/js/tether.min.js"></script>
<script src="<?=ROOT?>/js/bootstrap.min.js"></script>
<script src="<?=ROOT?>/js/worker.js"></script>
