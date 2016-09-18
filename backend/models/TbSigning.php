<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tb_signing".
 *
 * @property string $PAYROLL
 * @property string $EMPLOYEENAME
 * @property string $DESIGNATION
 * @property string $SERVICESTATUSCODE
 * @property string $HEMPLOYEENAME
 */
class TbSigning extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tb_signing';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PAYROLL'], 'required'],
            [['PAYROLL'], 'string', 'max' => 7],
            [['EMPLOYEENAME', 'DESIGNATION'], 'string', 'max' => 50],
            [['SERVICESTATUSCODE'], 'string', 'max' => 10],
            [['HEMPLOYEENAME'], 'string', 'max' => 150]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'PAYROLL' => 'Payroll',
            'EMPLOYEENAME' => 'Employeename',
            'DESIGNATION' => 'Designation',
            'SERVICESTATUSCODE' => 'Servicestatuscode',
            'HEMPLOYEENAME' => 'Hemployeename',
        ];
    }
}
