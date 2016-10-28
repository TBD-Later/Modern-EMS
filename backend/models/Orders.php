<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property integer $id
 * @property integer $customer_id
 * @property integer $order_number
 * @property string $job_description
 *
 * @property Customers $customer
 * @property Sales[] $sales
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_id', 'order_number'], 'required'],
            [['customer_id', 'order_number'], 'integer'],
            [['job_description'], 'string', 'max' => 500],
            [['order_number'], 'unique'],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customers::className(), 'targetAttribute' => ['customer_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customer_id' => 'Customer ID',
            'order_number' => 'Order Number',
            'job_description' => 'Job Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customers::className(), ['id' => 'customer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSales()
    {
        return $this->hasMany(Sales::className(), ['order_id' => 'id']);
    }
}
