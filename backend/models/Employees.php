<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "employees".
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property integer $phone
 * @property string $address
 * @property integer $id_number
 * @property integer $job_cat_id
 * @property string $start_date
 * @property string $end_date
 * @property string $photo
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 *
 * @property JobCategories $jobCat
 * @property Sales[] $sales
 */
class Employees extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employees';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'phone', 'id_number', 'job_cat_id', 'start_date', 'photo', 'status'], 'required'],
            [['phone', 'id_number', 'job_cat_id'], 'integer'],
            [['start_date', 'end_date', 'created_at', 'updated_at'], 'safe'],
            [['status'], 'string'],
            [['first_name', 'last_name', 'address'], 'string', 'max' => 100],
            [['photo'], 'string', 'max' => 200],
            [['job_cat_id'], 'exist', 'skipOnError' => true, 'targetClass' => JobCategories::className(), 'targetAttribute' => ['job_cat_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'phone' => 'Phone',
            'address' => 'Address',
            'id_number' => 'Id Number',
            'job_cat_id' => 'Job Category',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'photo' => 'Photo',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJobCat()
    {
        return $this->hasOne(JobCategories::className(), ['id' => 'job_cat_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSales()
    {
        return $this->hasMany(Sales::className(), ['employee_id' => 'id']);
    }
}
