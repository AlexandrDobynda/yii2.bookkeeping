<?php

namespace frontend\components\transactions;

use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;

class TransactionsSumForGraphic
{
    /**
     * @param ActiveDataProvider $dataProvider
     * @return array
     */
    public static function getFilteredDataFromDataProvider(ActiveDataProvider $dataProvider): array
    {
        $filterData = [];
        foreach ($dataProvider->getModels() as $model) {
            $filterData[] = [
                'amount' => $model->amount,
                'category' => $model->category->name,
                'author' => $model->profile->first_name,
            ];
        }

        return $filterData;
    }

    /**
     * @param ActiveDataProvider $dataProvider
     * @return array
     */
    public static function getDataForPieGraphic(ActiveDataProvider $dataProvider): array
    {
        $filteredData = static::getFilteredDataFromDataProvider($dataProvider);
        $categories = static ::getActiveCategories($dataProvider);
        $categoriesSum = [];
        $result = [];
        foreach ($filteredData as $key => $item) {
            foreach ($categories as $category) {
                if ($item['category'] == $category) {
                    $categoriesSum[$category]['name'] = $category;

                    if (!isset($categoriesSum[$category]['y'])) {
                        $categoriesSum[$category]['y'] = 0;
                    }
                    $categoriesSum[$category]['y'] += abs($item['amount']);
                }
            }
        };

//        //todo переделать.
        foreach ($categoriesSum as $categories) {
            $result[] = $categories;
        }

        return $result;
    }

    /**
     * @param ActiveDataProvider $dataProvider
     * @param array $names
     * @return array
     */
    public static function getDataForColumnGraphic(ActiveDataProvider $dataProvider, array $names): array
    {
        $filteredData = static::getFilteredDataFromDataProvider($dataProvider);
        $pieData = static::getDataForPieGraphic($dataProvider);
        $categories = static ::getActiveCategories($dataProvider);
        $categoriesSum = [];
        $result = [];

        foreach ($filteredData as $key => $item) {
            foreach ($names as $name) {
                if ($item['author'] == $name) {
                    $categoriesSum[$name]['type'] = 'column';
                    $categoriesSum[$name]['name'] = $name;

                    foreach ($categories as $key => $category) {
                        if (!isset($categoriesSum[$name]['data'][$key])) {
                            $categoriesSum[$name]['data'][$key] = 0;
                        }
                        if ($item['category'] == $category) {
                            $categoriesSum[$name]['data'][$key] += abs($item['amount']);
                        }
                    }
                }
            }
        };

        //        //todo переделать.
        foreach ($categoriesSum as $categories) {
            $result[] = $categories;
        }

        $result[] = [
            'type' => 'pie',
            'name' => 'Total consumption',
            'data' => $pieData,

            'center' => [60, 5],
            'size' => 110,
            'showInLegend' => false,
            'dataLabels' => [
                'enabled' => false,
            ],
        ];
        return $result;
    }

    /**
     * @param ActiveDataProvider $dataProvider
     * @return array
     */
    public static function getActiveCategories(ActiveDataProvider $dataProvider): array
    {
        $filtredData = static ::getFilteredDataFromDataProvider($dataProvider);

        $allCategories = ArrayHelper::getColumn($filtredData, 'category');

        return array_values(array_unique($allCategories));
    }
}

