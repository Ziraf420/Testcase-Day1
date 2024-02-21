<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Dealers $model */

$this->title = 'Update Dealers: ' . $model->dealer_id;
$this->params['breadcrumbs'][] = ['label' => 'Dealers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->dealer_id, 'url' => ['view', 'dealer_id' => $model->dealer_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dealers-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
