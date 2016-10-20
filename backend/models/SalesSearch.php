<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Sales;

/**
 * SalesSearch represents the model behind the search form about `backend\models\Sales`.
 */
class SalesSearch extends Sales
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id','quantity_purchased'], 'integer'],
            [['serial_number', 'description', 'order_id', 'employee_id', 'product_id'], 'safe'],
            [['product_unit_price', 'discount_percent'], 'number'],
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
        $query = Sales::find();

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
        $query->joinWith('employee');
        $query->joinWith('products');
        $query->joinWith('order');
        $query->andFilterWhere([
            'id' => $this->id,
            'order_id' => $this->order_id,
            'product_unit_price' => $this->product_unit_price,
            'quantity_purchased' => $this->quantity_purchased,
            'discount_percent' => $this->discount_percent,
        ]);

        $query->andFilterWhere(['like', 'serial_number', $this->serial_number])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'orders.order_number', $this->employee_id])
            ->andFilterWhere(['like', 'employees.id_number', $this->employee_id])
            ->andFilterWhere(['like', 'products.name', $this->product_id]);
            

        return $dataProvider;
    }
}
