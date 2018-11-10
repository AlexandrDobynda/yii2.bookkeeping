<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Invites */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="invites-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'family_id')->textInput() ?>

    <?= $form->field($model, 'secret_string')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'created_at')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
