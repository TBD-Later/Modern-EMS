<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "taxes".
 *
 * @property integer $id
 * @property integer $product_id
 * @property string $name
 * @property double $percent
 *
 * @property Products $product
 */
class Taxes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'taxes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'name', 'percent'], 'required'],
            [['product_id'], 'integer'],
            [['percent'], 'number'],
            [['name'], 'string', 'max' => 50],
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
            'product_id' => 'Product ID',
            'name' => 'Name',
            'percent' => 'Percent',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Products::className(), ['id' => 'product_id']);
    }
}
