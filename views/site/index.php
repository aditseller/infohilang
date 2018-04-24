<?php
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;


/* @var $this yii\web\View */

$this->title = Yii::$app->name;
?>


   <hr/>

    <div class="body-content">

        <div class="row">
          
            

				<?php 
			

$dataProvider = new ActiveDataProvider([
    'query' => app\models\Info::find()->where(['like','status', 'published']),
	'sort'=> ['defaultOrder' => ['created_at'=>SORT_DESC]],
    'pagination' => [
        'pageSize' => 7,
    ],
]);
			echo ListView::widget([
     'dataProvider' => $dataProvider,
     'itemOptions' => ['class' => 'item'],
     'itemView' => 'posts_view',
	 'summary'=>'',
     'pager' => [
	 'class' => \kop\y2sp\ScrollPager::className(),
	 'triggerOffset' => 5,
	 'triggerTemplate' => '<center><a style="cursor: pointer" class="btn btn-block btn-default">Load More....</a></center>',
	 'noneLeftText'=>'Kamu Sudah Up to Date, Guys!'
	 ],
	 
     
	]);
			
			?>   
     
            
            
        </div>

    </div>

