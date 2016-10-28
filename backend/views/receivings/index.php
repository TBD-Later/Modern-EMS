<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ReceivingsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Receivings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="receivings-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Receivings', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'time',
            'supplier_id',
            'reference',
            'comment',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
