<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Info */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Infos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="info-view">

    <h3>
	<?php if($model->type_info == 'lost') { ?>
				Telah Hilang : 
				
				<?php } else if($model->type_info == 'found') { ?>
				Telah Ditemukan : 

				<?php } ?> 		
	
	<?= Html::encode($this->title) ?>
	</h3>

<!-- 1. Link to jQuery (1.8 or later), -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> <!-- 33 KB -->

<!-- fotorama.css & fotorama.js. -->
<link  href="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet"> <!-- 3 KB -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script> <!-- 16 KB -->

<!-- 2. Add images to <div class="fotorama"></div>. -->
<div class="fotorama">
  <img src="<?= Yii::$app->params['rootUrl'] ?>/public/uploads/info/<?= sha1($model->id_info) ?>_1.jpg">
  <img src="<?= Yii::$app->params['rootUrl'] ?>/public/uploads/info/<?= sha1($model->id_info) ?>_2.jpg">
  <img src="<?= Yii::$app->params['rootUrl'] ?>/public/uploads/info/<?= sha1($model->id_info) ?>_3.jpg">
  
</div>

<div><?= $model->description ?></div>
				
				

</div>
