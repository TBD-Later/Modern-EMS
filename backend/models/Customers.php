<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "customers".
 *
 * @property integer $id
 * @property string $full_names
 * @property integer $phone
 * @property string $email
 * @property string $address
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Orders[] $orders
 */
class Customers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['full_names', 'phone', 'email', 'created_at', 'updated_at'], 'required'],
            [['phone', 'created_at', 'updated_at'], 'integer'],
            [['full_names', 'email'], 'string', 'max' => 100],
            [['address'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'full_names' => 'Full Names',
            'phone' => 'Phone',
            'email' => 'Email',
            'address' => 'Address',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Orders::className(), ['customer_id' => 'id']);
    }
}
