<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Category;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Category */
/* @var $form yii\widgets\ActiveForm */

$category = Category::find()
    ->having(['family_id' => Yii::$app->user->identity->family_id])
    ->all();
$categoryItems = ArrayHelper::map($category, 'id', 'name');
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'name')->textInput() ?>

    <?= $form->field($model, 'parent_id')
        ->dropDownList($categoryItems, ['prompt' => 'None'])
        ->label('Parent category') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
