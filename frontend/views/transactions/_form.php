<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Transactions */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="transactions-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'category_id')
        ->dropDownList([
            1 => 'First',
            2 => 'Second',
            6 => 'Third',
        ]) ?>

    <?= $form->field($model, 'amount')->textInput() ?>

<!--    --><?//= $form->field($model, 'category_id')->textInput() ?>

    <?= $form->field($model, 'account_id')->textInput() ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
