<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Accounts */
/* @var $form yii\widgets\ActiveForm */

$currency = Yii::$app
    ->CbRF
    ->filter(['currency' => 'usd, eur'])
    ->all();

$currencyItems = ArrayHelper::map($currency, 'char_code', 'name');
?>

<div class="accounts-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput() ?>

    <?= $form->field($model, 'currency')
        ->dropDownList($accountItems, ['prompt' => 'RUR'])
        ->label('Currency') ?>

    <?= $form->field($model, 'amount')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
