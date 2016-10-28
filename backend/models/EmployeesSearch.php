<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Employees;

/**
 * EmployeesSearch represents the model behind the search form about `backend\models\Employees`.
 */
class EmployeesSearch extends Employees
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'phone', 'id_number'], 'integer'],
            [['first_name', 'last_name', 'address', 'start_date', 'end_date', 'photo', 'status', 'created_at', 'updated_at', 'job_cat_id'], 'safe'],
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
        $query = Employees::find();

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
        $query->joinWith('jobCat');
        $query->andFilterWhere([
            'id' => $this->id,
            'phone' => $this->phone,
            'id_number' => $this->id_number,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'photo', $this->photo])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'job_categories.name', $this->job_cat_id]);

        return $dataProvider;
    }
}
