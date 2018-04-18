<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;


/* @var $this yii\web\View */
/* @var $model app\models\Users */

$this->title = 'Sign Up';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


    <center><img width="30%" src="<?= Yii::$app->homeUrl ?>/public/img/signup.png">
</center>

    <?php $form = ActiveForm::begin(); ?>

   <div class="col-md-12"> <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?> </div>

   <div class="col-md-12"> <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?></div>

   <div class="col-md-12"> <?= $form->field($model, 'fullname')->textInput(['maxlength' => true]) ?></div>

    <div class="col-md-12"><?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
        'template' => '<div class="well"><div class="row"><div class="col-lg-5">{image}</div><div class="col-lg-7">{input}</div></div></div>',
    ]) ?></div>


    <div class="form-group"><div class="col-md-12">
        <?= Html::submitButton('Sign Up', ['class' => 'btn btn-lg btn-block btn-warning']) ?>
    </div></div>

    <?php ActiveForm::end(); ?>
    


