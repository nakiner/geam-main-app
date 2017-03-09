<header>
    <nav class="navbar navbar-toggleable-md navbar-inverse bg-navbar fixed-top">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#menuList" aria-controls="menuList" aria-expanded="false" aria-label="Toggle">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand">
            <img src="/src/img/mini.png" width="30" height="30" alt="">
        </a>
        <div class="collapse navbar-collapse" id="menuList">
            <ul class="navbar-nav">
                <?
                    $res = new \ovl\app\models\IndexModel();
                    $res = $res->getMenuItems();
                    foreach($res as $curr => $key)
                    {
                        //if($_SERVER['REQUEST_URI'] == $key['link']) echo("<li class=\"nav-item active\"> <a class=\"nav-link\" href=\"$key[link]\">$key[name]</a></li>");
                        echo("<li class=\"nav-item\"> <a class=\"nav-link\" href=\"$key[itemLink]\">$key[itemName]</a></li>");
                    }
                    if(!isset($_SESSION['ovl_user']) || empty($_SESSION['ovl_user'])) echo '<li class="nav-item"><a class="nav-link" data-toggle="modal" data-target="#popup" href="">Account</a></li>';
                    else
                    {
                        $usr = $_SESSION['ovl_user']['userName'];
                        echo("<li class=\"nav-item\"> <a class=\"nav-link\" href=\"user\">Hi, $usr</a></li>");
                    }
                ?>
            </ul>
        </div>
    </nav>
</header>
<br/><br/><br/>