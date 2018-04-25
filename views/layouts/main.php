<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
	<?= $this->render('metahead') ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => '',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-default navbar-fixed-top',
        ],
    ]);
   


    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
           ['label' => 'Sign Up', 'url' => ['/users/signup'],'visible'=>Yii::$app->user->isGuest],
           Yii::$app->user->isGuest ?
                  ['label' => 'Login', 'url' => ['/site/login']] :
                  ['label' => Yii::$app->user->identity->fullname,
                       'items' => [
                           ['label' => 'Account Setting', 'url' => ['/users/setting']],
                           ['label' => 'My Info', 'url' => ['/info/myinfo']],
                           ['label' => 'Logout','url' => ['/site/logout'],'linkOptions' => ['data-method' => 'post']],
           ],
                  ],
               ],
           ]);

    NavBar::end();
    ?>

    <div style="padding: 5%; "></div>
    <div class="container">
       
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        
    </div>
</footer>

<?php 

	if(@$_SERVER["HTTPS"] != "on") {
   header("HTTP/1.1 301 Moved Permanently");
   header("Location: https://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"]);
   exit();
}

?>

<?php
include 'lib/mobiledetect/Mobile_Detect.php';
$detect = new Mobile_Detect();

if ($detect->isMobile()) {
	
} else {
    header('Location: https://www.instagram.com/infohilang/');
    exit(0);
}
?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
