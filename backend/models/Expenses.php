<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "expenses".
 *
 * @property integer $id
 * @property integer $employee_id
 * @property string $expense_name
 * @property string $time
 * @property string $amount
 * @property string $comment
 *
 * @property Employees $employee
 */
class Expenses extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'expenses';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['employee_id', 'expense_name', 'amount', 'comment'], 'required'],
            [['employee_id'], 'integer'],
            [['time'], 'safe'],
            [['amount'], 'number'],
            [['expense_name'], 'string', 'max' => 200],
            [['comment'], 'string', 'max' => 300],
            [['employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employees::className(), 'targetAttribute' => ['employee_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'employee_id' => 'Employee ID',
            'expense_name' => 'Expense Name',
            'time' => 'Time',
            'amount' => 'Amount',
            'comment' => 'Comment',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployee()
    {
        return $this->hasOne(Employees::className(), ['id' => 'employee_id']);
    }
}
