<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\ReceivingProducts */

$this->title = 'Create Receiving Products';
$this->params['breadcrumbs'][] = ['label' => 'Receiving Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="receiving-products-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
