<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "payment_types".
 *
 * @property integer $id
 * @property string $name
 *
 * @property SalesPayment[] $salesPayments
 */
class PaymentTypes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'payment_types';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSalesPayments()
    {
        return $this->hasMany(SalesPayment::className(), ['payment_type_id' => 'id']);
    }
}
