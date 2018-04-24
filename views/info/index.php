<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\InfoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Information';
$this->params['breadcrumbs'][] = $this->title;
?>
<hr/>
<div class="info-index">

    
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
				.'<h3>'.$data->name.'</h3>'
                .'<b>Tanggal Kejadian : '.date('j F Y',strtotime($data->since)).'</b>'
                .' <span class="glyphicon glyphicon-map-marker"></span> '.$data->location
                .'</div></div>',
                        ['information/'.$data->url]);
            },
        ),
    ],
]); ?>

</div>
