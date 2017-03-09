<!DOCTYPE html>
<html lang="en">
    <? $this->render('Main/Head'); ?>
    <body>
        <? $this->render('Main/Header'); ?>
        <div class="container">
            <? $this->render('Components/Auth'); ?>
            <div class="row">
                <?
                    $db = new \ovl\app\models\IndexModel();
                    $items = $db->getNews();
                    foreach($items as $row => $line)
                    {
                        echo
                        ("
                            <div class=\"card w-100\">
                                <div class=\"card-header\">
                                    By <strong><cite title=\"$line[itemBy]\">$line[itemBy]</cite></strong>, $line[itemDate]
                                </div>
                                <div class=\"card-block\">
                                    <blockquote class=\"card-blockquote\">
                                        <p><b>$line[itemTitle]</b></p>
                                        <footer>$line[itemContent]</footer>
                                    </blockquote>
                                </div>
                            </div>
                        ");
                    }
                ?>
            </div>
        </div>
        <? $this->render('Main/Footer'); ?>
    </body>
    <? $this->render('Main/CDN'); ?>
</html>
