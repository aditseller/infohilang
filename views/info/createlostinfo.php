 <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\Info */

$this->title = 'Buat Info Kehilangan';
$this->params['breadcrumbs'][] = ['label' => 'Infos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="info-create">

    <h3><center><?= Html::encode($this->title) ?></center></h3>

 
   	<div class="col-md-12"> <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?></div>

    <div class="col-md-12"><?= $form->field($model, 'type_info')->hiddenInput(['value'=>'lost'])->label(false) ?></div>

  	<div class="col-md-12">  <?= $form->field($model, 'name')->textInput(['maxlength' => true,'placeholder'=>'Ex : Sepeda Motor Dengan Plat B 1234 ABC']) ?></div>

   	<div class="col-md-12"> <?= $form->field($model, 'category')->dropDownList(ArrayHelper::map(\app\models\Category::find()->asArray()->all(), 'category', 'category'), ['prompt' => '-- Select Category --']) ?></div>

    <div class="col-md-12"><?= $form->field($model, 'location')->textInput(['maxlength' => true,'id' => 'autocomplete','onFocus'=>'geolocate()','placeholder'=>'Lokasi Kejadian']) ?></div>

    <div class="col-md-12"><?= $form->field($model, 'since')->widget(\yii\jui\DatePicker::classname(), [
       'dateFormat' => 'yyyy-MM-dd',
    'clientOptions' => [
        'changeMonth' => true,
        'yearRange' => '1945:today',
        'changeYear' => true,
        
    ],
   ])->textInput(['placeholder'=>'Tanggal Kejadian']) ?></div>

  <div class="col-md-12"> <?= $form->field($model, 'description')->textArea(['rows'=>8,'placeholder'=>'Ceritakan Deskripsi atau Kronologis terkait kehilangan. Kosongkan jika tidak ada...']) ?></div>




    <div class="col-md-4"> 
    	<div id="image_preview" class="thumbnail"><img style="max-height: 100px; max-width: 100%" id="previewing" src="" /></div>
		<div class="thumbnail"><?= $form->field($model, 'image')->fileInput(['id'=> 'file']) ?></div>
    </div>

    <div class="col-md-4">
    <div id="image_preview" class="thumbnail"><img style="max-height: 100px; max-width: 100%" id="previewing2" src="" /></div>
     <div class="thumbnail"><?= $form->field($model, 'image2')->fileInput(['id'=> 'file2']) ?></div>
     </div>


        <div class="col-md-4">
    <div id="image_preview" class="thumbnail"><img style="max-height: 100px; max-width: 100%" id="previewing3" src="" /></div>
     <div class="thumbnail"><?= $form->field($model, 'image3')->fileInput(['id'=> 'file3']) ?></div>
     </div>

   

   <div class="col-md-12">  <?= $form->field($model, 'contact_person')->textInput(['maxlength' => true,'placeholder'=>'Nomor Telepon Yang Bisa Dihubungi']) ?></div>

  <div class="col-md-12"> <?= $form->field($model, 'contact_person_name')->textInput(['maxlength' => true,'placeholder'=>'Nama Kontak Personal']) ?></div>

    

    <div class="form-group"><div class="col-md-12">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-block btn-lg btn-success']) ?>
    </div></div>

    <?php ActiveForm::end(); ?>

</div>









<!--Image Preview Upload -->

<style> /* Style untuk tampilan Form upload gambar */
  
    #image_preview {
      
   width: 100%;
   height: 100%;
      
      text-align: center;
      color: #C0C0C0;
      background-color: transparent;
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


<script>
        $(function() {
      $("#file2").change(function() {
        $("#message2").empty(); // To remove the previous error message
        var file2 = this.files[0];
        var imagefile = file2.type;
        var match= ["image/jpeg","image/png","image/jpg"];
        if (!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
        {
          $('#previewing2').attr('src','noimg.png');
          $("#message2").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
          return false;
        }else {
          var reader2 = new FileReader();
          reader2.onload = imageIsLoadedTwo;
          reader2.readAsDataURL(this.files[0]);
        }
      });
    });
    function imageIsLoadedTwo(e) {
      $("#file2").css("color","green");
      $('#image_preview');
      $('#previewing2').attr('src', e.target.result);
    }
  </script>


  <script>
        $(function() {
      $("#file3").change(function() {
        $("#message3").empty(); // To remove the previous error message
        var file3 = this.files[0];
        var imagefile = file3.type;
        var match= ["image/jpeg","image/png","image/jpg"];
        if (!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
        {
          $('#previewing3').attr('src','noimg.png');
          $("#message3").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
          return false;
        }else {
          var reader3 = new FileReader();
          reader3.onload = imageIsLoadedThree;
          reader3.readAsDataURL(this.files[0]);
        }
      });
    });
    function imageIsLoadedThree(e) {
      $("#file3").css("color","green");
      $('#image_preview');
      $('#previewing3').attr('src', e.target.result);
    }
  </script>

 






<!--Suggestion Location --> 
 <script>
      // This example displays an address form, using the autocomplete feature
      // of the Google Places API to help users fill in the information.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      var placeSearch, autocomplete;
      var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
      };

      function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
            {types: ['geocode']});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
      }

      function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();

        for (var component in componentForm) {
          document.getElementById(component).value = '';
          document.getElementById(component).disabled = false;
        }

        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
          var addressType = place.address_components[i].types[0];
          if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType).value = val;
          }
        }
      }

      // Bias the autocomplete object to the user's geographical location,
      // as supplied by the browser's 'navigator.geolocation' object.
      function geolocate() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
          });
        }
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-1IMyf_wuArOIbw7jR7Kuqj_tZ54Qejs&libraries=places&callback=initAutocomplete"
        async defer></script>