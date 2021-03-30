<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "County".
 *
 * @property int $CountyID
 * @property string|null $CountyName
 * @property string|null $CountyDescription
 * @property string|null $CreatedDate
 * @property int|null $CreatedBy
 * @property string|null $UpdatedDate
 * @property int|null $UpdatedBy
 */
class County extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'County';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['CreatedDate', 'UpdatedDate'], 'safe'],
            [['CreatedBy', 'UpdatedBy'], 'integer'],
            [['CountyName'], 'string', 'max' => 150],
            [['CountyDescription'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'CountyID' => 'County ID',
            'CountyName' => 'County Name',
            'CountyDescription' => 'County Description',
            'CreatedDate' => 'Created Date',
            'CreatedBy' => 'Created By',
            'UpdatedDate' => 'Updated Date',
            'UpdatedBy' => 'Updated By',
        ];
    }
}
