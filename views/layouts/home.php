<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$model = new app\models\InfoSearch;
$this->beginContent('@app/views/layouts/main.php'); ?>

<div class="home">
<div class="col-md-12"><?= Html::a('<span class="glyphicon glyphicon-edit"></span> Buat Info',['info/create'],['class'=>'btn btn-lg btn-block btn-primary']) ?></div>
<div class="col-md-12">
    <?php $form = ActiveForm::begin([
                  'action' => ['/info/index'],
                  'method' => 'get',
              ]); ?>

			  
	<div class="input-group">
    <?= $form->field($model, 'name')->textInput(['class'=>'form-control input-lg','placeholder'=>'Cari Yang Hilang Disini...'])->label(false) ?>
	<span class="input-group-btn">
	<div class="help-block"></div>
    <?= Html::button('<span class="glyphicon glyphicon-search"></span>', ['class' => 'btn btn-default btn-lg','type'=>'submit']) ?>
    </span>
</div>
                <?php  ActiveForm::end(); ?>
</div>




      <?= $content; ?>

</div>




<?php $this->endContent(); ?>

