<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "sharvil".
 *
 * @property string $name
 * @property string $mob_num
 * @property string $address
 * @property string $email
 */
class Sharvil extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sharvil';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'mob_num', 'address', 'email'], 'required'],
            [['name', 'mob_num', 'address', 'email'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'mob_num' => 'Mob Num',
            'address' => 'Address',
            'email' => 'Email',
        ];
    }
}
