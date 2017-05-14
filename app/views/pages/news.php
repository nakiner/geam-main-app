<?
    if(!IsUser()) $this->render('components/auth');
    $db = new \app\models\IndexModel();
    $items = $db->getNews($this->data['news_id']);
    if($items->fetch_assoc() == NULL)
    {
        $this->set('type', 'danger');
        $this->set('message', 'Seems like there is no news.');
        $this->render('Components/Alert');
    }
?>
<div class="row">
    <?
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
