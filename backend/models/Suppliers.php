<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "suppliers".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 *
 * @property Receivings[] $receivings
 */
class Suppliers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'suppliers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 300],
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
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReceivings()
    {
        return $this->hasMany(Receivings::className(), ['supplier_id' => 'id']);
    }
}
