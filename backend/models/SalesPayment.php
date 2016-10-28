<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "sales_payment".
 *
 * @property integer $id
 * @property integer $sales_id
 * @property integer $payment_type_id
 * @property string $payment_amount
 *
 * @property Sales $sales
 * @property PaymentTypes $paymentType
 */
class SalesPayment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sales_payment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sales_id', 'payment_type_id', 'payment_amount'], 'required'],
            [['sales_id', 'payment_type_id'], 'integer'],
            [['payment_amount'], 'number'],
            [['sales_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sales::className(), 'targetAttribute' => ['sales_id' => 'id']],
            [['payment_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => PaymentTypes::className(), 'targetAttribute' => ['payment_type_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sales_id' => 'Sales ID',
            'payment_type_id' => 'Payment Type ID',
            'payment_amount' => 'Payment Amount',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSales()
    {
        return $this->hasOne(Sales::className(), ['id' => 'sales_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaymentType()
    {
        return $this->hasOne(PaymentTypes::className(), ['id' => 'payment_type_id']);
    }
}
