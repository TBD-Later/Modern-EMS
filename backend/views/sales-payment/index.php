<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SalesPaymentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sales Payments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sales-payment-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Sales Payment', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'sales_id',
            'payment_type_id',
            'payment_amount',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
