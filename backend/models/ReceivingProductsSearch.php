<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\ReceivingProducts;

/**
 * ReceivingProductsSearch represents the model behind the search form about `backend\models\ReceivingProducts`.
 */
class ReceivingProductsSearch extends ReceivingProducts
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'receiving_id', 'product_id', 'description', 'quantity'], 'integer'],
            [['cost_price', 'unit_price'], 'number'],
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
        $query = ReceivingProducts::find();

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
            'receiving_id' => $this->receiving_id,
            'product_id' => $this->product_id,
            'description' => $this->description,
            'cost_price' => $this->cost_price,
            'unit_price' => $this->unit_price,
            'quantity' => $this->quantity,
        ]);

        return $dataProvider;
    }
}
