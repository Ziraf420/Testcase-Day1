<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Subscriber;

/**
 * SubscriberSearch represents the model behind the search form of `app\models\Subscriber`.
 */
class SubscriberSearch extends Subscriber
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'Interface', 'Gender', 'SIMType', 'DealerID'], 'integer'],
            [['TransactionTime', 'Nationality', 'IDNumber', 'FullName', 'DateofBirth', 'Address', 'MSISDN'], 'safe'],
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
        $query = Subscriber::find();

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
            'TransactionTime' => $this->TransactionTime,
            'Interface' => $this->Interface,
            'DateofBirth' => $this->DateofBirth,
            'Gender' => $this->Gender,
            'SIMType' => $this->SIMType,
            'DealerID' => $this->DealerID,
        ]);

        $query->andFilterWhere(['like', 'Nationality', $this->Nationality])
            ->andFilterWhere(['like', 'IDNumber', $this->IDNumber])
            ->andFilterWhere(['like', 'FullName', $this->FullName])
            ->andFilterWhere(['like', 'Address', $this->Address])
            ->andFilterWhere(['like', 'MSISDN', $this->MSISDN]);

        return $dataProvider;
    }
}
