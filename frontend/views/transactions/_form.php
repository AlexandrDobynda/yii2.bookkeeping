<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Category;
use common\models\Accounts;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Transactions */
/* @var $form yii\widgets\ActiveForm */


$category = Category::find()
    ->having(['family_id' => Yii::$app->user->identity->family_id])
    ->all();
$categoryItems = ArrayHelper::map($category, 'id', 'name');

$account = Accounts::find()
    ->having(['user_id' => Yii::$app->user->identity->id])
    ->all();
$accountItems = ArrayHelper::map($account, 'id', 'name');
?>

<div class="transactions-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'amount')->textInput() ?>

    <?= $form->field($model, 'category_id')
        ->dropDownList($categoryItems, ['prompt' => 'Chose category'])
        ->label('Category') ?>

    <?= $form->field($model, 'account_id')
        ->dropDownList($accountItems, ['prompt' => 'Chose account'])
        ->label('Account') ?>

    <?= $form->field($model, 'date')->widget(
        DatePicker::className(),[
            'pluginOptions' => [
                'todayHighlight' => true,
                'autoclose'=>true,
                'format' => 'dd-M-yyyy',
            ]
        ]
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
