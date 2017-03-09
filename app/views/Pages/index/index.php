<!DOCTYPE html>
<html lang="en">
    <? $this->render('Main/Head'); ?>
    <body>
        <? $this->render('Main/Header'); ?>
            <div class="container">
                <? $this->render('Components/Auth'); ?>
            </div>
        <? $this->render('Main/Footer'); ?>
    </body>
    <? $this->render('Main/CDN'); ?>
</html>
