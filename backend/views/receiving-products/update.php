<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ReceivingProducts */

$this->title = 'Update Receiving Products: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Receiving Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="receiving-products-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
