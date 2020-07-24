<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "RegistrationCenter".
 *
 * @property int $RegistrationCenterID
 * @property string|null $RegistrationCenterName
 * @property string|null $RegistrationCenterType
 * @property int|null $CountyID
 * @property int|null $ConstituencyID
 * @property string|null $RegistrationCenterEmail
 * @property int|null $RegisteredBy
 * @property string|null $RegistrationDate
 * @property string|null $RegistrationUpdateDate
 */
class RegistrationCenter extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'RegistrationCenter';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['CountyID', 'ConstituencyID', 'RegisteredBy'], 'integer'],
            [['RegistrationDate', 'RegistrationUpdateDate'], 'safe'],
            [['RegistrationCenterName', 'RegistrationCenterEmail'], 'string', 'max' => 250],
            [['RegistrationCenterType'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'RegistrationCenterID' => 'Registration Center ID',
            'RegistrationCenterName' => 'Registration Center Name',
            'RegistrationCenterType' => 'Registration Center Type',
            'CountyID' => 'County ID',
            'ConstituencyID' => 'Constituency ID',
            'RegistrationCenterEmail' => 'Registration Center Email',
            'RegisteredBy' => 'Registered By',
            'RegistrationDate' => 'Registration Date',
            'RegistrationUpdateDate' => 'Registration Update Date',
        ];
    }
}
