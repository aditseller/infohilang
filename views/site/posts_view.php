<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
$imginfo = Yii::$app->params['rootUrl'].'public/uploads/info/'.sha1($model->id_info).'_1.jpg';
$header_response_imginfo = get_headers($imginfo, 1);
?>



  
            <div class="col-lg-4 boxhomefeed">
				<p class="spacerhomefeed"></p>
				<a href="<?= Yii::$app->request->baseUrl; ?>/information/<?= $model->url; ?>">
				<?php if(strpos($header_response_imginfo[0],"404") !== false) { ?>
                <img class="thumbhomefeed" src="<?= Yii::$app->params['rootUrl'] ?>public/img/nothumb.png">
				
				<?php } else { ?>
				<img class="thumbhomefeed" src="<?= Yii::$app->params['rootUrl'] ?>public/uploads/info/<?= sha1($model->id_info) ?>_1.jpg">
				<?php } ?>
                <p class="titlehomefeed">
				<?php if($model->type_info == 'lost') { ?>
				Telah Hilang : 
				
				<?php } else if($model->type_info == 'found') { ?>
				Telah Ditemukan : 

				<?php } ?> 				
				
				<?= $model->name ?>
				</p>
				  </a>
          
                <p class="spacerhomefeed"></p>
            </div>
			
            
  