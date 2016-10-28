<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\SalesPayment */

$this->title = 'Create Sales Payment';
$this->params['breadcrumbs'][] = ['label' => 'Sales Payments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sales-payment-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
