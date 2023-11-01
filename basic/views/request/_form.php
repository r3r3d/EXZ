<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Car;
$items = Car::find()
        ->select(['name'])
        ->indexBy('id')
        ->column();
/** @var yii\web\View $this */
/** @var app\models\Request $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="request-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_user')->hiddenInput(['value'=>Yii::$app->user->getId()])->label(false) ?>

    <?= $form->field($model, 'id_car')->dropdownList([
        $items,'prompt'=>'Выберите марку автомобиля']
    ); ?>

    <?= $form->field($model, 'marka')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'engine_volume')->textInput() ?>

    <?= $form->field($model, 'create_date')->textInput() ?>

    <?= $form->field($model, 'carcase')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
