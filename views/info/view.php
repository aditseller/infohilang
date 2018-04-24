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

	<div class="postingtext"><?= date('j F Y H:i',strtotime($model->created_at)) ?>, By <a href="<?= Yii::$app->params['rootUrl'] ?>u/<?= $model->created_by ?>"> @<?= $model->created_by ?></a> </div>
<div>
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
</div>


<div class="list-group">
  <a href="#" class="list-group-item sincetext">
  	<center><span class="label label-primary"><span class="glyphicon glyphicon-time"></span> Waktu Kejadian </span>
  		</center>
  		<div><?= date('l, j F Y',strtotime($model->since)) ?></div>

  	</a>

  	<a href="#" class="list-group-item locationtext">
  	<center><span class="label label-primary"><span class="glyphicon glyphicon-map-marker"></span> Lokasi Kejadian </span>
  		</center>
  		<div><?= $model->location ?></div>

  	</a>

  <a href="#" class="list-group-item descriptiontext">
  	<center><span class="label label-primary"><span class="glyphicon glyphicon-bullhorn"></span> Deskripsi Kejadian</span></center>
  	<div><?= $model->description ?></div>
  </a>

  <a href="tel:<?= $model->contact_person ?>" class="list-group-item cptext"><span class="label label-primary"><span class="glyphicon glyphicon-phone"></span> Kontak Yang Bisa Dihubungi </span>
  	<div><?= $model->contact_person ?> (Adul)</div>
  </a>
</div>

				
				

</div>
