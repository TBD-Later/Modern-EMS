<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ExpensesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Expenses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="expenses-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Expenses', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'employee_id',
            'expense_name',
            'time',
            'amount',
            // 'comment',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
