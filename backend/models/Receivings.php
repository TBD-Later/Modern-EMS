<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "receivings".
 *
 * @property integer $id
 * @property string $time
 * @property integer $supplier_id
 * @property integer $reference
 * @property integer $comment
 *
 * @property ReceivingProducts[] $receivingProducts
 * @property Suppliers $supplier
 */
class Receivings extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'receivings';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['time', 'supplier_id', 'reference', 'comment'], 'required'],
            [['time'], 'safe'],
            [['supplier_id', 'reference', 'comment'], 'integer'],
            [['supplier_id'], 'exist', 'skipOnError' => true, 'targetClass' => Suppliers::className(), 'targetAttribute' => ['supplier_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'time' => 'Time',
            'supplier_id' => 'Supplier ID',
            'reference' => 'Reference',
            'comment' => 'Comment',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReceivingProducts()
    {
        return $this->hasMany(ReceivingProducts::className(), ['receiving_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSupplier()
    {
        return $this->hasOne(Suppliers::className(), ['id' => 'supplier_id']);
    }
}
