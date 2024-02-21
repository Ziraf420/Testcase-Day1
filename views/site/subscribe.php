<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Subscriber Management';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>

<?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success">
        <?= Yii::$app->session->getFlash('success') ?>
    </div>
<?php endif; ?>

<div class="subscriber-form">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'TransactionTime')->textInput(['type' => 'date']) ?>

    <?= $form->field($model, 'Interface')->dropDownList([0 => 'SMS', 1 => 'USSD']) ?>

    <?= $form->field($model, 'Nationality')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'IDNumber')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FullName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DateofBirth')->textInput(['type' => 'date']) ?>

    <?= $form->field($model, 'Gender')->dropDownList([0 => 'female', 1 => 'male']) ?>

    <?= $form->field($model, 'Address')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'SIMType')->dropDownList([0 => 'personal', 1 => 'corporate']) ?>

    <?= $form->field($model, 'MSISDN')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DealerID')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
