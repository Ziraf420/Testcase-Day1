<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Subscriber $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Subscribers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="subscriber-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id',
        [
            'attribute' => 'TransactionTime',
            'value' => Yii::$app->formatter->asDate($model->TransactionTime, 'yyyy-MM-dd'),
        ],
        [
            'attribute' => 'Interface',
            'value' => $model->Interface == 0 ? 'SMS' : 'USSD',
        ],
        'Nationality',
        'IDNumber',
        'FullName',
        [
            'attribute' => 'DateofBirth',
            'value' => Yii::$app->formatter->asDate($model->DateofBirth, 'yyyy-MM-dd'),
        ],
        [
            'attribute' => 'Gender',
            'value' => $model->Gender == 0 ? 'Female' : 'Male',
        ],
        'Address:ntext',
        [
            'attribute' => 'SIMType',
            'value' => $model->SIMType == 0 ? 'Personal' : 'Corporate',
        ],
        'MSISDN',
        [
            'attribute' => 'DealerID',
            'value' => isset($model->dealer) ? $model->dealer->dealer_name : null,
        ],
    ],
]) ?>


</div>
