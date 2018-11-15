<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Accounts;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\AccountTransaction */
/* @var $form yii\widgets\ActiveForm */

$from = Accounts::find()
    ->having(['user_id' => Yii::$app->user->identity->id])
    ->all();
$fromItems = ArrayHelper::map($from, 'id', 'name', 'currency');

$to = Accounts::find()
    ->having(['user_id' => Yii::$app->user->identity->id])
    ->all();
$toItems = ArrayHelper::map($to, 'id', 'name', 'currency');


?>

<div class="account-transaction-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'from_id')
        ->dropDownList($fromItems, ['prompt' => 'Chose account'])
        ->label('From account') ?>

    <?= $form->field($model, 'to_id')
        ->dropDownList($toItems, ['prompt' => 'Chose account'])
        ->label('To account') ?>

    <?= $form->field($model, 'amount')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>

        <?= Html::a('Back', ['../accounts'], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
