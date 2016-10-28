<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "receiving_products".
 *
 * @property integer $id
 * @property integer $receiving_id
 * @property integer $product_id
 * @property integer $description
 * @property string $cost_price
 * @property string $unit_price
 * @property integer $quantity
 *
 * @property Receivings $receiving
 * @property Products $product
 */
class ReceivingProducts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'receiving_products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['receiving_id', 'product_id', 'cost_price', 'unit_price', 'quantity'], 'required'],
            [['receiving_id', 'product_id', 'description', 'quantity'], 'integer'],
            [['cost_price', 'unit_price'], 'number'],
            [['receiving_id'], 'exist', 'skipOnError' => true, 'targetClass' => Receivings::className(), 'targetAttribute' => ['receiving_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'receiving_id' => 'Receiving ID',
            'product_id' => 'Product ID',
            'description' => 'Description',
            'cost_price' => 'Cost Price',
            'unit_price' => 'Unit Price',
            'quantity' => 'Quantity',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReceiving()
    {
        return $this->hasOne(Receivings::className(), ['id' => 'receiving_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Products::className(), ['id' => 'product_id']);
    }
}
