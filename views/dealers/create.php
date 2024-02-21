<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Dealers $model */

$this->title = 'Create Dealers';
$this->params['breadcrumbs'][] = ['label' => 'Dealers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dealers-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
