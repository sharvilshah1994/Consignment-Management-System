<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "balmer_lawrie".
 *
 * @property string $SNO
 * @property string $COUNTRY
 * @property string $NAME
 * @property string $ADDRESS
 * @property string $CP1
 * @property string $CP2
 * @property string $TEL
 * @property string $FAX
 * @property string $FFEMAIL
 */
class BalmerLawrie extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'balmer_lawrie';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SNO', 'COUNTRY'], 'required'],
            [['SNO', 'COUNTRY', 'NAME', 'ADDRESS', 'CP1', 'CP2', 'TEL', 'FAX', 'FFEMAIL'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'SNO' => 'Sno',
            'COUNTRY' => 'Country',
            'NAME' => 'Name',
            'ADDRESS' => 'Address',
            'CP1' => 'Cp1',
            'CP2' => 'Cp2',
            'TEL' => 'Tel',
            'FAX' => 'Fax',
            'FFEMAIL' => 'Ffemail',
        ];
    }
}
