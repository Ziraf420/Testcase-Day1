<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Dealers;
use kartik\date\DatePicker;
use kartik\datetime\DateTimePicker;

/** @var yii\web\View $this */
/** @var app\models\Subscriber $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="subscriber-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'TransactionTime')->widget(DateTimePicker::class, [
        'options' => ['placeholder' => 'Select transaction time ...'],
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd hh:ii'
        ]
    ]); ?>

    <?= $form->field($model, 'Interface')->dropDownList(['0' => 'SMS', '1' => 'USSD']) ?>

    <?= $form->field($model, 'Nationality')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'IDNumber')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FullName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DateofBirth')->widget(DatePicker::class, [
        'options' => ['placeholder' => 'Select date of birth ...'],
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
    ]); ?>

    <?= $form->field($model, 'Gender')->dropDownList(['0' => 'Female', '1' => 'Male']) ?>

    <?= $form->field($model, 'Address')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'SIMType')->dropDownList(['0' => 'Personal', '1' => 'Corporate']) ?>

    <?= $form->field($model, 'MSISDN')->textInput(['maxlength' => true, 'type' => 'number']) ?>

    <?= $form->field($model, 'DealerID')->dropDownList(
        ArrayHelper::map(Dealers::find()->all(), 'dealer_id', 'dealer_name'),
        ['prompt' => 'Select dealer ...']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
