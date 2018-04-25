<?php

use yii\helpers\Html;
use yii\grid\GridView;


$this->title = 'My Info';
$this->params['breadcrumbs'][] = $this->title;
?>
<hr/>
<div class="myinfo-index">

    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

     <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'showHeader' => false,
    'columns' => [
        array(
            'format' => 'raw',
            'value'=>function ($data) {
                return Html::a(
                '<div class="row" >'
                .'<div class="col-md-11"><span class="glyphicon glyphicon-calendar"></span> '.date('j F Y',strtotime($data->created_at))
				.'<div style="font-size:1.1em; font-weight:bold;">'.$data->name.'</h3>'
               
                .'</div></div>',
                        ['information/'.$data->url]);
            },
        ),
		
		
            ['class' => 'yii\grid\ActionColumn',
        'header' => '',
        'template'=>'{delete}',
          'buttons' => [
              
              'delete' => function($url, $model) {
                return Html::a('<span class="glyphicon glyphicon-trash"></span> Delete',$url, [
                    'title' => Yii::t('yii','delete'),'class'=>'btn btn-danger btn-block',
                    'data-confirm' => Yii::t('yii','Are You Sure Delete this Data ?'),
										'data-method' => 'post',
                ]);
			}
          ],
		],
    ],
]); ?>

</div>