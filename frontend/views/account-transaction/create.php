<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\AccountTransaction */

$this->title = 'Transfer between accounts';
//$this->params['breadcrumbs'][] = ['label' => 'Transfer between accounts', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="account-transaction-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
