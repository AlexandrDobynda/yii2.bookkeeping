<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TransactionsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Transactions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transactions-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <p>
        <?= Html::a('Create Transactions', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'showFooter' => true,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'amount',
                'footer' => 'Count: ',
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
                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'date_from',
                    'attribute2' => 'date_to',
                    'type' => DatePicker::TYPE_RANGE,
                    'separator' => '-',
                    'pluginOptions' => [
                            'todayHighlight' => true,
                        'autoclose' => true,
                        'format' => 'dd-M-yyyy'
                    ]
                ]),
                'format' => 'date',
            ],
            [
                'attribute' => 'created_at',
                'format' => ['date', 'dd.MM.YYYY'],
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
