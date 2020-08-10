<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "DeathDetails".
 *
 * @property int $ID
 * @property string|null $DateofDeath
 * @property int|null $CountyID
 * @property int|null $ConstituencyID
 * @property int|null $RegistrationCenterID
 * @property string|null $Status
 * @property string|null $CauseofDeath
 * @property string|null $Occupation
 * @property string|null $DeathCertificateNo
 * @property int|null $CreatedBy
 * @property string|null $CreationDate
 * @property int|null $UpdatedBy
 * @property string|null $UpdateDate
 */
class DeathDetails extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'DeathDetails';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['DateofDeath', 'CreationDate', 'UpdateDate'], 'safe'],
            [['CountyID', 'ConstituencyID', 'RegistrationCenterID', 'CreatedBy', 'UpdatedBy'], 'integer'],
            [['Status'], 'string', 'max' => 250],
            [['CauseofDeath'], 'string', 'max' => 300],
            [['Occupation'], 'string', 'max' => 150],
            [['DeathCertificateNo'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'DateofDeath' => 'Dateof Death',
            'CountyID' => 'County ID',
            'ConstituencyID' => 'Constituency ID',
            'RegistrationCenterID' => 'Registration Center ID',
            'Status' => 'Status',
            'CauseofDeath' => 'Causeof Death',
            'Occupation' => 'Occupation',
            'DeathCertificateNo' => 'Death Certificate No',
            'CreatedBy' => 'Created By',
            'CreationDate' => 'Creation Date',
            'UpdatedBy' => 'Updated By',
            'UpdateDate' => 'Update Date',
        ];
    }
}
