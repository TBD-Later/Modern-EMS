<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Receivings */

$this->title = 'Create Receivings';
$this->params['breadcrumbs'][] = ['label' => 'Receivings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="receivings-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
