<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SalesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sales-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'order_id') ?>

    <?= $form->field($model, 'employee_id') ?>

    <?= $form->field($model, 'product_id') ?>

    <?= $form->field($model, 'serial_number') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'product_unit_price') ?>

    <?php // echo $form->field($model, 'quantity_purchased') ?>

    <?php // echo $form->field($model, 'discount_percent') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
