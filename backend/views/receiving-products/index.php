<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ReceivingProductsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Receiving Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="receiving-products-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Receiving Products', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'receiving_id',
            'product_id',
            'description',
            'cost_price',
            // 'unit_price',
            // 'quantity',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
