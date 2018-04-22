<?php

use yii\helpers\Html;


?>

<h3><center>Silahkan Pilih Info</center></h3>

<?= Html::a('Kehilangan',['info/createlostinfo'],['class'=>'btn btn-lg btn-block btn-danger']) ?>

<?= Html::a('Ditemukan',['info/createfoundinfo'],['class'=>'btn btn-lg btn-block btn-warning']) ?>