<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "BirthDetails".
 *
 * @property int $BirthCertNo
 * @property string|null $FullName
 * @property string|null $DateofBirth
 * @property string|null $MothersName
 * @property string|null $FathersName
 * @property string|null $Gender
 * @property int|null $CountyID
 * @property int|null $ConstituencyID
 * @property string|null $DocumentofRegistration
 * @property string|null $DocumentNumber
 * @property int|null $IsDead
 * @property int|null $CreatedBy
 * @property string|null $CreatedDate
 * @property string|null $UpdatedDate
 * @property int|null $UpdatedBy
 * @property int|null $RegistrationCenterID
 */
class BirthDetails extends \yii\db\ActiveRecord
{
    public $Year;
    public $Population;
    public $County;
    public $county;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'BirthDetails';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['BirthCertNo','DateofBirth','FullName','DocumentofRegistration','DocumentNumber','MothersName','Gender'], 'required'],
            [['CountyID', 'ConstituencyID', 'IsDead', 'CreatedBy', 'UpdatedBy', 'RegistrationCenterID'], 'integer'],
            [['DateofBirth', 'CreatedDate', 'UpdatedDate'], 'safe'],
            [['FullName', 'MothersName', 'FathersName', 'DocumentNumber'], 'string', 'max' => 250],
            [['BirthCertNo', 'Gender', 'DocumentofRegistration'], 'string', 'max' => 50],
            [['BirthCertNo', 'DocumentNumber'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'BirthCertNo' => 'Birth Cert No',
            'FullName' => 'Full Name',
            'DateofBirth' => 'Dateof Birth',
            'MothersName' => 'Mothers Name',
            'FathersName' => 'Fathers Name',
            'Gender' => 'Gender',
            'CountyID' => 'County ID',
            'ConstituencyID' => 'Constituency ID',
            'DocumentofRegistration' => 'Documentof Registration',
            'DocumentNumber' => 'Document Number',
            'IsDead' => 'Is Dead',
            'CreatedBy' => 'Created By',
            'CreatedDate' => 'Created Date',
            'UpdatedDate' => 'Updated Date',
            'UpdatedBy' => 'Updated By',
            'RegistrationCenterID' => 'Registration Center ID',
        ];
    }
}
