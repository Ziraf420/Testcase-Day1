<?php

use app\models\Dealers;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\DealersSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Dealers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dealers-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Dealers', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'dealer_id',
            'dealer_name',
            'description',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Dealers $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'dealer_id' => $model->dealer_id]);
                 }
            ],
        ],
    ]); ?>


</div>
