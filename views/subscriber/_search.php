<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\SubscriberSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="subscriber-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'TransactionTime') ?>

    <?= $form->field($model, 'Interface') ?>

    <?= $form->field($model, 'Nationality') ?>

    <?= $form->field($model, 'IDNumber') ?>

    <?php // echo $form->field($model, 'FullName') ?>

    <?php // echo $form->field($model, 'DateofBirth') ?>

    <?php // echo $form->field($model, 'Gender') ?>

    <?php // echo $form->field($model, 'Address') ?>

    <?php // echo $form->field($model, 'SIMType') ?>

    <?php // echo $form->field($model, 'MSISDN') ?>

    <?php // echo $form->field($model, 'DealerID') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
