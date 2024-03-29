<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Dealers $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="dealers-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'dealer_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
