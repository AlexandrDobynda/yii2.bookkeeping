<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Transactions */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Transactions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transactions-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'amount',
            ],
            [
                'label' => 'Category',
                'attribute' => 'category.name',
            ],
            [
                'label' => 'Account',
                'attribute' => 'account.name',
            ],
            [
                'label' => 'Author',
                'attribute' => 'profile.first_name',
            ],
            [
                'attribute' => 'date',
                'format' => ['date', 'dd.MM.Y'],
            ],
            [
                'attribute' => 'created_at',
                'format' => ['date', 'dd.MM.Y'],
            ],
        ],
    ]) ?>

</div>
