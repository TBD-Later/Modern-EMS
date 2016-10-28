<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\ReceivingProducts */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Receiving Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="receiving-products-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'receiving_id',
            'product_id',
            'description',
            'cost_price',
            'unit_price',
            'quantity',
        ],
    ]) ?>

</div>
