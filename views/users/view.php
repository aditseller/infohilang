<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Users */

$this->title = $model->fullname;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$urlimg = Yii::$app->params['rootUrl']."public/uploads/profile/".sha1($model->id_user).'.jpg';
$header_response_urlimg = get_headers($urlimg, 1);
?>
<div class="users-view">


  
<table>
        <tr>
            <td width="30%" height="100%">
        <?php if(strpos($header_response_urlimg[0],"404") !== false) { ?>
        <!-- No Picture -->
        <img width="100%" class="img-circle" src="<?= Yii::$app->homeUrl ?>/public/img/nopic.png">

        <?php } else { ?>

        <!-- Picture Profile Available -->
       <img width="100%" class="img-circle" src="<?= Yii::$app->homeUrl ?>/public/uploads/profile/<?= sha1($model->id_user) ?>.jpg">

        <?php } ?>
      </td> 
      <td style="width: 3%;"></td>
            <td>
            <div style="font-size: 2.0em; font-weight: bold;">
                <?= $model->fullname ?> <?php if($model->verified == 1) { ?>
                <span class='glyphicon glyphicon-ok-circle'></span>
                <?php } else if($model->verified == 0) {} ?>
                </div>

<div style="font-size: 1.3em; font-style: italic;">
    <?php 

    if($model->verified == 0) {

        echo "<span class='label label-danger'><span class='glyphicon glyphicon-warning-sign'></span> account has not been verified</span>";
    } else if($model->verified == 1) {
        echo"@".$model->username;
    }

     ?> 
     </div>

            </td>

        </tr>
</table>


</div>
