<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\widgets\DatePicker;
use frontend\components\FooterGridViewSum;
use yii\helpers\ArrayHelper;
use common\models\Category;
use common\models\Accounts;
use common\models\Profile;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TransactionsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Transactions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transactions-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <p>
        <?= Html::a('Add transaction', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <br>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'showFooter' => true,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn',
                'footer' => 'Sum:',
            ],

            [
                'class' => FooterGridViewSum::className(),
                'attribute' => 'amount',
            ],
            [
                'label' => 'Category',
                'attribute' => 'category.name',
                'filter' =>
                    ArrayHelper::map(Category::find()
                        ->having(['family_id' => Yii::$app->user->identity->family_id])
                        ->all(), 'name', 'name'),
            ],
            [
                'label' => 'Account',
                'attribute' => 'account.name',
                'filter' =>
                    ArrayHelper::map(
                        Accounts::find()
                            ->having(['family_id' => Yii::$app->user->identity->family_id])
                            ->all(), 'name', 'name'),
            ],
            [
                'label' => 'Author',
                'attribute' => 'profile.first_name',
//                'filter' =>
//                    ArrayHelper::map(
//                        Profile::find()
//                            ->having(['family_id' => Yii::$app->user->identity->family_id])
//                            ->all(), 'name', 'name'),
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
                        'format' => 'dd M. yyyy'
                    ]
                ]),
                'format' => ['date', 'php:d M. Y'],
            ],
            [
                'attribute' => 'created_at',
                'format' => 'date',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
