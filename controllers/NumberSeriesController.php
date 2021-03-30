<?php

namespace app\controllers;

use Yii;
use app\models\NumberSeries;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * NumberSeriesController implements the CRUD actions for NumberSeries model.
 */
class NumberSeriesController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all NumberSeries models.
     * @return mixed
     */
    public function actionIndex()
    {
        //query all available NumberSeries
        $dataProvider = new ActiveDataProvider([
            'query' => NumberSeries::find(),
        ]);
        //return list of all models in index page
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single NumberSeries model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        //allow display of model information
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new NumberSeries model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        //calling a NumberSeries model
        $model = new NumberSeries();
        //checking if form has information
        if ($model->load(Yii::$app->request->post())){
            //checking if the Module exists in database
            $model_exist = NumberSeries::find()->where(['Module'=>$model['Module']])->one();
            //if record returned
            if ($model_exist) {
                // code...
                //error message to be displayed
                Yii::$app->session->setFlash('message', " ".$model_exist->Module." Already exist kindly consider updating");
            }
            //if no record
            elseif (empty($model_exist)) {
                // code...
                //check if record is saved
                if ($model->save()) {
                    // code...
                    //show information in view page
                    return $this->redirect(['view', 'id' => $model->module]);
                }
            }
        }
        //rederect to create page for user to enter New NumberSeries Information
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing NumberSeries model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        //finding model to update
        $model = $this->findModel($id);
        //checking if form has information and if data is saved
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //redirect to view page if successful
            return $this->redirect(['view', 'id' => $model->Module]);
        }
        //redirect to update to allow modification of existing Model
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing NumberSeries model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the NumberSeries model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return NumberSeries the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = NumberSeries::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
