<?php

namespace frontend\components\transactions;

use yii\data\ActiveDataProvider;

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
     * @param array $categoriesList
     * @return array
     */
    public static function getDataForPieGraphic(ActiveDataProvider $dataProvider, array $categoriesList): array
    {
        $filteredData = static::getFilteredDataFromDataProvider($dataProvider);
        $categoriesSum = [];
        $test = [];
        foreach ($filteredData as $key => $item) {
            foreach ($categoriesList as $category) {
                if ($item['category'] == $category) {
                    $categoriesSum[$category]['name'] = $category;

                    if (!isset($categoriesSum[$category]['y'])) {
                        $categoriesSum[$category]['y'] = 0;
                    }
                    $categoriesSum[$category]['y']  += $item['amount'] > 0 ? $item['amount'] : $item['amount'] * (-1);
                }
            }
        };

//        //todo переделать.
        foreach ($categoriesSum as $categories) {
            $test[] = $categories;
        }

        return $test;
    }

    /**
     * @param ActiveDataProvider $dataProvider
     * @param array $categoriesList
     * @param array $names
     * @return array
     */
    public static function getDataForColumnGraphic(
        ActiveDataProvider $dataProvider,
        array $categoriesList,
        array $names
    ): array
    {
        $filteredData = static::getFilteredDataFromDataProvider($dataProvider);
        $pieData = static::getDataForPieGraphic($dataProvider, $categoriesList);
        $categoriesSum = [];
        $result = [];
        $categories = array_keys($categoriesList);

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
                            $categoriesSum[$name]['data'][$key] += $item['amount'] > 0 ? $item['amount'] : $item['amount'] * (-1);
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

                'center' => [100, 80],
                'size' => 110,
                'showInLegend' => false,
                'dataLabels' => [
                    'enabled' => false,
                ],
        ];
        return $result;
    }
}

