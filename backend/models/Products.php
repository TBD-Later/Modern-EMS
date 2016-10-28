<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property integer $id
 * @property integer $product_cat_id
 * @property string $name
 * @property string $model
 * @property string $serial_number
 * @property string $cost_price
 * @property string $unit_price
 * @property integer $quantity
 *
 * @property ProductCategories $productCat
 * @property Sales[] $sales
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_cat_id', 'name', 'model', 'serial_number', 'cost_price', 'unit_price', 'quantity'], 'required'],
            [['product_cat_id', 'quantity'], 'integer'],
            [['cost_price', 'unit_price'], 'number'],
            [['name', 'serial_number'], 'string', 'max' => 200],
            [['model'], 'string', 'max' => 100],
            [['product_cat_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductCategories::className(), 'targetAttribute' => ['product_cat_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_cat_id' => 'Product Categories',
            'name' => 'Name',
            'model' => 'Model',
            'serial_number' => 'Serial Number',
            'cost_price' => 'Cost Price',
            'unit_price' => 'Unit Price',
            'quantity' => 'Quantity',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductCat()
    {
        return $this->hasOne(ProductCategories::className(), ['id' => 'product_cat_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSales()
    {
        return $this->hasMany(Sales::className(), ['employee_id' => 'id']);
    }
}
