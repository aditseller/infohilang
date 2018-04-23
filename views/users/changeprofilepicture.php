 <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
 <?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


?>

 <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

   <div id="image_preview" class="thumbnail"><img id="previewing" src="" /></div>
    <?= $form->field($model, 'image')->fileInput(['required' => true,'id'=> 'file']) ?>

<div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-lg btn-block btn-primary']) ?>
    </div>
<?php ActiveForm::end(); ?>

<?= Html::a('Cancel', ['/users/setting'], ['class'=>'btn btn-lg btn-block btn-default']) ?>


<style> /* Style untuk tampilan Form upload gambar */
  
    #image_preview {
      
   width: 100%;
   height: 100%;
      
      text-align: center;
      color: #C0C0C0;
      background-color: #eee;
      overflow: hidden;
    }
   
   
  </style>
  <script> /* script JQuery untuk load gambar pada bagian preview */
    $(function() {
      $("#file").change(function() {
        $("#message").empty(); // To remove the previous error message
        var file = this.files[0];
        var imagefile = file.type;
        var match= ["image/jpeg","image/png","image/jpg"];
        if (!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
        {
          $('#previewing').attr('src','noimg.png');
          $("#message").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
          return false;
        }else {
          var reader = new FileReader();
          reader.onload = imageIsLoaded;
          reader.readAsDataURL(this.files[0]);
        }
      });
    });
    function imageIsLoaded(e) {
      $("#file").css("color","green");
      $('#image_preview');
      $('#previewing').attr('src', e.target.result);
    }
</script>


