<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;

?>
<?php if(Yii::$app->session->hasFlash('verified')): ?>
<div class="alert alert-success">
        <span class="glyphicon glyphicon-bullhorn"></span><b> Yay! Congrats, Your Account is Verified</b>
    </div>

<?php endif; ?>

	<table>
		<tr>
			<td width="30%" height="100%"><img width="100%" src="<?= Yii::$app->homeUrl ?>/public/img/nopic.png"></td>	
			<td>
			<div style="font-size: 2.0em; font-weight: bold;">
				<?= Yii::$app->user->identity->fullname ?> <?php if(Yii::$app->user->identity->verified == 1) { ?>
				<span class='glyphicon glyphicon-ok-circle'></span>
				<?php } else if(Yii::$app->user->identity->verified == 0) {} ?>
				</div>

<div style="font-size: 1.3em; font-style: italic;">
	<?php 

	if(Yii::$app->user->identity->verified == 0) {

		echo "<span class='label label-danger'><span class='glyphicon glyphicon-warning-sign'></span> account has not been verified</span>";
	} else if(Yii::$app->user->identity->verified == 1) {
		echo"@".Yii::$app->user->identity->username;
	}

	 ?>	
	 </div>

			</td>

		</tr>
	


	

</table>


<div class="list-group">
  <a href="#" class="list-group-item"><span class="glyphicon glyphicon-text-background" aria-hidden="true"></span> Change Fullname</a>
  <a href="#" class="list-group-item"><span class="glyphicon glyphicon-sunglasses" aria-hidden="true"></span> Change Password</a>
  <a href="#" class="list-group-item"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Change Email</a>
  <a href="#" class="list-group-item"><span class="glyphicon glyphicon-phone" aria-hidden="true"></span> Change Phone Number</a>
  <a href="#" class="list-group-item"><span class="glyphicon glyphicon-map-marker"></span> Change Location</a>
  <a href="#" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Change Gender</a>
</div>

<?php if(Yii::$app->user->identity->verified == 0): ?>
    <?php $form = ActiveForm::begin(); ?>

   <?= $form->field($model, 'verified')->hiddenInput(['value' => '1'])->label(false) ?>

<div class="form-group">
        <?= Html::submitButton('<span class="glyphicon glyphicon-check" aria-hidden="true"></span> Verify Now !', ['class' => 'btn btn-lg btn-block btn-success']) ?>
    </div>
<?php ActiveForm::end(); ?>

<?php else: ?>
<?php endif; ?>