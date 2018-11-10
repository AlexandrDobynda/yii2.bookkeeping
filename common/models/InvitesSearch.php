<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Invites;

/**
 * InvitesSearch represents the model behind the search form of `common\models\Invites`.
 */
class InvitesSearch extends Invites
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'family_id'], 'integer'],
            [['secret_string', 'created_at', 'email'], 'safe'],
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
        $query = Invites::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'family_id' => $this->family_id,
        ]);

        $query->andFilterWhere(['like', 'secret_string', $this->secret_string])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
}
