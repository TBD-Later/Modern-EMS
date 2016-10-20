<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "sales".
 *
 * @property integer $id
 * @property integer $order_id
 * @property integer $employee_id
 * @property integer $product_id
 * @property string $serial_number
 * @property string $description
 * @property string $product_unit_price
 * @property integer $quantity_purchased
 * @property double $discount_percent
 *
 * @property Orders $order
 * @property Employees $employee
 * @property Products $employee0
 * @property SalesPayment[] $salesPayments
 */
class Sales extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sales';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'employee_id', 'product_id', 'serial_number', 'product_unit_price', 'quantity_purchased'], 'required'],
            [['order_id', 'employee_id', 'product_id', 'quantity_purchased'], 'integer'],
            [['product_unit_price', 'discount_percent'], 'number'],
            [['serial_number'], 'string', 'max' => 200],
            [['description'], 'string', 'max' => 300],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Orders::className(), 'targetAttribute' => ['order_id' => 'id']],
            [['employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employees::className(), 'targetAttribute' => ['employee_id' => 'id']],
            [['employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['employee_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Order ID',
            'employee_id' => 'Employee ID',
            'product_id' => 'Product ID',
            'serial_number' => 'Serial Number',
            'description' => 'Description',
            'product_unit_price' => 'Product Unit Price',
            'quantity_purchased' => 'Quantity Purchased',
            'discount_percent' => 'Discount Percent',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Orders::className(), ['id' => 'order_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployee()
    {
        return $this->hasOne(Employees::className(), ['id' => 'employee_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasOne(Products::className(), ['id' => 'employee_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSalesPayments()
    {
        return $this->hasMany(SalesPayment::className(), ['sales_id' => 'id']);
    }
}
