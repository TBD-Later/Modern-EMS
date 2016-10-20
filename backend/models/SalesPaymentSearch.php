<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\SalesPayment;

/**
 * SalesPaymentSearch represents the model behind the search form about `backend\models\SalesPayment`.
 */
class SalesPaymentSearch extends SalesPayment
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sales_id', 'payment_type_id'], 'integer'],
            [['payment_amount'], 'number'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = SalesPayment::find();

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
            'sales_id' => $this->sales_id,
            'payment_type_id' => $this->payment_type_id,
            'payment_amount' => $this->payment_amount,
        ]);

        return $dataProvider;
    }
}
