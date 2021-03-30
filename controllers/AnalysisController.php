<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\BirthDetails;

/**
 * AnalysisController implements the CRUD actions for Analysis model.
 */
class AnalysisController extends Controller
{
	
	/**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['signup', 'error', 'login',],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout', 'error','birth-analysis','death-analysis'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionBirthAnalysis()
    {
    	# code...
        if (\Yii::$app->user->can('birth-analys')) {
            # code...
            $sql = 'SELECT count(*) as Population, DATEPART(year, CreatedDate) as Year FROM BirthDetails where IsDead = 0 GROUP BY DATEPART(year, CreatedDate)';
            $sql_gender = 'SELECT count(Gender) as Gender, DATEPART(year, CreatedDate) as Year FROM BirthDetails where IsDead = 0 GROUP BY DATEPART(year, CreatedDate)';
            $sql_county = "SELECT count(*) as Population, CountyID as county FROM BirthDetails where IsDead = 0 and CountyID <> '' GROUP BY CountyID";
            $sql_county_gender = "SELECT count(*) as County, DATEPART(year, CreatedDate) as Year FROM BirthDetails where IsDead = 0 and CountyID <> '' GROUP BY DATEPART(year, CreatedDate),Gender";
            //executing query to get population per year
            $population_per_year = BirthDetails::findBySql($sql)->all();
            //executing query to get population per gender per year
            $population_per_year_per_gender = BirthDetails::findBySql($sql_gender)->all();
            //executing query to get population per county per year
            $population_per_year_per_county = BirthDetails::findBySql($sql_county)->all();
            //executing query to get population per gender per county per year
            $population_per_year_per_gender_per_county = BirthDetails::findBySql($sql_county_gender)->all();
            return $this->render('analysis',[
                              'population_per_year' => $population_per_year,
                              'population_per_year_per_gender' => $population_per_year_per_gender,
                              'population_per_year_per_county' => $population_per_year_per_county,
                              'population_per_year_per_gender_per_county' => $population_per_year_per_gender_per_county,
                          ]);
        }else{
            throw new ForbiddenHttpException('Action is not Allowed');
        }
    	
    }
    public function actionDeathAnalysis()
    {
    	# code...
        if (\Yii::$app->user->can('death-analys')) {
            # code...
            $sql = 'SELECT count(*) as Population, DATEPART(year, CreatedDate) as Year FROM BirthDetails where IsDead = 1 GROUP BY DATEPART(year, CreatedDate)';
            $sql_gender = 'SELECT count(Gender) as Gender, DATEPART(year, CreatedDate) as Year FROM BirthDetails where IsDead = 1 GROUP BY DATEPART(year, CreatedDate)';
            $sql_county = "SELECT count(*) as Population, CountyID as county FROM DeathDetails where CountyID <> '' GROUP BY CountyID";
            $sql_county_gender = "SELECT count(*) as County, DATEPART(year, CreatedDate) as Year FROM BirthDetails where IsDead = 1 and CountyID <> '' GROUP BY DATEPART(year, CreatedDate),Gender";
            //executing query to get population per year
            $population_per_year = BirthDetails::findBySql($sql)->all();
            //executing query to get population per gender per year
            $population_per_year_per_gender = BirthDetails::findBySql($sql_gender)->all();
            //executing query to get population per county per year
            $population_per_year_per_county = BirthDetails::findBySql($sql_county)->all();
            //executing query to get population per gender per county per year
            $population_per_year_per_gender_per_county = BirthDetails::findBySql($sql_county_gender)->all();
            return $this->render('deathanalysis',[
                              'population_per_year' => $population_per_year,
                              'population_per_year_per_gender' => $population_per_year_per_gender,
                              'population_per_year_per_county' => $population_per_year_per_county,
                              'population_per_year_per_gender_per_county' => $population_per_year_per_gender_per_county,
                          ]);
        }else{
            throw new ForbiddenHttpException('Action is not Allowed');
        }
    	
    }
}