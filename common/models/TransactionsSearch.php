<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Transactions;

/**
 * TransactionsSearch represents the model behind the search form of `common\models\Transactions`.
 */
class TransactionsSearch extends Transactions
{
    public $date_from;
    public $date_to;
    /**
     * {@inheritdoc}
     */
    public function attributes()
    {
        return array_merge(parent::attributes(), ['category.name', 'account.name', 'profile.first_name']);
    }

    public function rules()
    {
        return [
            [['id', 'user_id', 'category_id', 'account_id', 'profile_id', 'family_id'], 'integer'],
            [['amount'], 'number'],
            [['created_at', 'date', 'category.name', 'account.name', 'profile.first_name'], 'safe'],
            [['date_from', 'date_to'], 'date', 'format' => 'php:Y-m-d'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Transactions::find()
            ->having(['family_id' => Yii::$app->user->identity->family_id]);


        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);


        $query->joinWith(['category' => function($query) { $query->from(['category' => 'category']); }]);
        $dataProvider->sort->attributes['category.name'] = [
            'asc' => ['category.name' => SORT_ASC],
            'desc' => ['category.name' => SORT_DESC],
        ];


        $query->joinWith(['account' => function($query) { $query->from(['account' => 'accounts']); }]);
        $dataProvider->sort->attributes['account.name'] = [
            'asc' => ['account.name' => SORT_ASC],
            'desc' => ['account.name' => SORT_DESC],
        ];

        $query->joinWith(['profile' => function($query) { $query->from(['profile' => 'profile']); }]);
        $dataProvider->sort->attributes['profile.first_name'] = [
            'asc' => ['profile.first_name' => SORT_ASC],
            'desc' => ['profile.first_name' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'amount' => $this->amount,
            'category.name' => $this->getAttribute('category.name'),
            'account.name' => $this->getAttribute('account.name'),
            'profile.first_name' => $this->getAttribute('profile.first_name'),
            'created_at' => $this->created_at,
        ]);
        $query
            ->andFilterWhere(['>=', 'date', $this->date_from ? strtotime($this->date_from . '00:00:00') : null])
            ->andFilterWhere(['<=', 'date', $this->date_to ? strtotime($this->date_to . '23:59:59') : null]);

        return $dataProvider;
    }
}
