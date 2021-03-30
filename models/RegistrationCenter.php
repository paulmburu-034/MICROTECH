<?php

namespace app\models;

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
 * @property string|null $RegistrationUpdatedDate
 * @property int|null $RegistrationUpdatedBy
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
            [['CountyID', 'ConstituencyID', 'RegisteredBy','RegistrationUpdateBy'], 'integer'],
            [['RegistrationDate', 'RegistrationUpdateDate'], 'safe'],
            ['RegistrationCenterEmail','email'],
            ['RegistrationCenterEmail', 'unique', 'targetClass' => '\app\models\RegistrationCenter', 'message' => 'This email address has already been taken.'],
            [[ 'RegistrationCenterEmail'], 'string', 'max' => 250],
            [['RegistrationCenterName'], 'string', 'max' => 200],
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
            'RegistrationUpdatedDate' => 'Registration Updated Date',
            'RegistrationUpdatedBy' => 'Registration Updated By',
        ];
    }
}
