<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Constituency".
 *
 * @property int $CounstituencyID
 * @property string|null $ConstituencyName
 * @property string|null $ConstituencyDescription
 * @property int|null $CountyID
 * @property string|null $CreatedDate
 * @property int|null $CreatedBy
 * @property string|null $UpdatedDate
 * @property int|null $UpdatedBy
 */
class Constituency extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Constituency';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ConstituencyName','CountyID'],'required'],
            [['CountyID', 'CreatedBy', 'UpdatedBy'], 'integer'],
            [['CreatedDate', 'UpdatedDate'], 'safe'],
            [['ConstituencyName', 'ConstituencyDescription'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ConstituencyID' => 'Constituency ID',
            'ConstituencyName' => 'Constituency Name',
            'ConstituencyDescription' => 'Constituency Description',
            'CountyID' => 'County ID',
            'CreatedDate' => 'Created Date',
            'CreatedBy' => 'Created By',
            'UpdatedDate' => 'Updated Date',
            'UpdatedBy' => 'Updated By',
        ];
    }
    public function getCounty() {
        return $this->hasOne(County::className(), ['CountyID' => 'CountyID'])->from(county::tableName());
    }
}
