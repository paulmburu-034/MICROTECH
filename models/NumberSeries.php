<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NumberSeries".
 *
 * @property int $id
 * @property string $Module
 * @property int $No_
 * @property int $Year
 */
class NumberSeries extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'NumberSeries';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['No_', 'Year'], 'integer'],
            [['Module'], 'string', 'max' => 50],
            [['Module'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Module' => 'Module',
            'No_' => 'No',
            'Year' => 'Year',
        ];
    }
    public function getYearsList() {
        //getting the current year
        $currentYear = date('Y');
        //getting the year start
        $yearFrom = 2013;
        //getting a range of years between $yearFrom and $currentYear
        $yearsRange = range($yearFrom, $currentYear);
        //returning the range
        return array_combine($yearsRange, $yearsRange);
    }
    public static function GenerateNumbers($module,$year){
        //Checking if module exists in the Number Series
        $search = NumberSeries::findOne(['Module'=>$module]);
        //check if module exists and the passed $year is equal to the parameter $search->Year
        if ($search && $search->Year == $year) {
            // code...
            //increment No_ by 1
            $search->No_ += 1;
            //save the changes
            $search->save();
            //return generated No_
            return $search->No_;
        }
        //Check if module exists and if the parameterized $search->Year is not equal to $year
        elseif($search && $search->Year != $year){
            //error message to be displayed
            Yii::$app->session->setFlash('message', "The Number Series is not active. Contact the ICT department");
        }
        //incase of any other condition
        else{
            //error message to be displayed
            Yii::$app->session->setFlash('message', "Module or Year does not exist in the Number Series");
        }
    }
}
