<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Subscriber $model */

$this->title = 'Update Subscriber: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Subscribers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="subscriber-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
