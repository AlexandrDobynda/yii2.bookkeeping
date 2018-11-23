<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\widgets\DatePicker;
use frontend\components\FooterGridViewSum;
use yii\helpers\ArrayHelper;
use common\models\Category;
use common\models\Accounts;
use common\models\Profile;
use miloschuman\highcharts\Highcharts;
use yii\web\JsExpression;

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
//                'filter' => [
//                        0 => 'smth',
//
//                ]
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
                'filter' =>
                    ArrayHelper::map(
                        Profile::find()
                            ->having(['family_id' => Yii::$app->user->identity->family_id])
                            ->all(), 'first_name', 'first_name'),
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

    <pre>
        <?php




        foreach ($dataProvider->getModels() as $model)
        {
            $arr[] = [
                $model->category->name,
                 $model->amount,

            ];
        }

//        foreach ($dataProvider->getModels() as $model)
//        {
//            $e[] = $model->profile->first_name;
//        }
//        var_dump($a);
//        var_dump($arr);
        ?>
    </pre>
    <p>
        <?=
//        Highcharts::widget([
//            'options' => [
//                'title' => ['text' => 'Sample title - pie chart'],
//                'plotOptions' => [
//                    'pie' => [
//                        'cursor' => 'pointer',
//                    ],
//                ],
//                'series' => [
//                    [ // new opening bracket
//                        'type' => 'pie',
//                        'name' => 'Money spent',
//                        'data' => $arr,
//                    ] // new closing bracket
//                ],
//            ],
//        ]);

        Highcharts::widget([
            'scripts' => [
                'modules/exporting',
                'themes/grid-light',
            ],
            'options' => [
                'title' => [
                    'text' => 'Combination chart',
                ],
                'xAxis' => [
                    'categories' => ['Apples', 'Oranges', 'Pears', 'Bananas', 'Plums'],
                ],
                'labels' => [
                    'items' => [
                        [
                            'html' => 'Total fruit consumption',
                            'style' => [
                                'left' => '50px',
                                'top' => '18px',
                                'color' => new JsExpression('(Highcharts.theme && Highcharts.theme.textColor) || "black"'),
                            ],
                        ],
                    ],
                ],
                'series' => [
                    [
                        'type' => 'column',
                        'name' => 'Jane',
                        'data' => [3, 2, 1, 3, 4],
                    ],
                    [
                        'type' => 'column',
                        'name' => 'John',
                        'data' => [2, 3, 5, 7, 6],
                    ],
                    [
                        'type' => 'column',
                        'name' => 'Joe',
                        'data' => [4, 3, 3, 9, 0],
                    ],
                    [
                        'type' => 'spline',
                        'name' => 'Average',
                        'data' => [3, 2.67, 3, 6.33, 3.33],
                        'marker' => [
                            'lineWidth' => 2,
                            'lineColor' => new JsExpression('Highcharts.getOptions().colors[3]'),
                            'fillColor' => 'white',
                        ],
                    ],
                    [
                        'type' => 'pie',
                        'name' => 'Total consumption',
                        'data' => [
                            [
                                'name' => 'Jane',
                                'y' => 13,
                                'color' => new JsExpression('Highcharts.getOptions().colors[0]'), // Jane's color
                            ],
                            [
                                'name' => 'John',
                                'y' => 23,
                                'color' => new JsExpression('Highcharts.getOptions().colors[1]'), // John's color
                            ],
                            [
                                'name' => 'Joe',
                                'y' => 19,
                                'color' => new JsExpression('Highcharts.getOptions().colors[2]'), // Joe's color
                            ],
                        ],
                        'center' => [100, 80],
                        'size' => 100,
                        'showInLegend' => false,
                        'dataLabels' => [
                            'enabled' => false,
                        ],
                    ],
                ],
            ]
        ]);?>
    </p>
</div>
