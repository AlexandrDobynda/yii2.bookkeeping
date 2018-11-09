<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\AccountTransaction */

$this->title = 'Transfer between accounts';
?>
<div class="account-transaction-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
