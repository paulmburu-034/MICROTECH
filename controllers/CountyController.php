<?php

namespace app\controllers;

use Yii;
use app\models\County;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;

/**
 * CountyController implements the CRUD actions for County model.
 */
class CountyController extends Controller
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
     * Lists all County models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (\Yii::$app->user->can('county-index')) {
        # code...
            $dataProvider = new ActiveDataProvider([
                'query' => County::find(),
            ]);

            return $this->render('index', [
                'dataProvider' => $dataProvider,
            ]);
        }else{
            throw new ForbiddenHttpException('Action is not Allowed');
        }
    }

    /**
     * Displays a single County model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if (\Yii::$app->user->can('view-county')) {
        # code...
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }else{
            throw new ForbiddenHttpException('Action is not Allowed');
        }
        
    }

    /**
     * Creates a new County model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (\Yii::$app->user->can('create-county')) {
        # code...
            $model = new County();

            if ($model->load(Yii::$app->request->post())){
                $county = $model["CountyName"];
                $county_search = County::findOne(['CountyName'=>$county]);
                if (!empty($county_search)) {
                    # code...
                    Yii::$app->session->setFlash('message', "County already exists");
                }else if(empty($county_search)){
                    if ($model->save()) {
                        return $this->redirect(['view', 'id' => $model->CountyName]);
                    }

                }else{
                    Yii::$app->session->setFlash('message', "Contact System Administrator for support");
                }
            }

            return $this->render('create', [
                'model' => $model,
            ]);
        }else{
            throw new ForbiddenHttpException('Action is not Allowed');
        }
        
    }

    /**
     * Updates an existing County model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if (\Yii::$app->user->can('update-county')) {
        # code...
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post())){
                $county = $model["CountyName"];
                $county_search = County::findOne(['CountyName'=>$county]);
                if (!empty($county_search)) {
                    # code...
                    Yii::$app->session->setFlash('message', "County already exists");
                }else if(empty($county_search)){
                    if ($model->save()) {
                        return $this->redirect(['view', 'id' => $model->CountyName]);
                    }

                }else{
                    Yii::$app->session->setFlash('message', "Contact System Administrator for support");
                }
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        }else{
            throw new ForbiddenHttpException('Action is not Allowed');
        }
        
    }

    /**
     * Deletes an existing County model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if (\Yii::$app->user->can('delete-county')) {
        # code...
            $this->findModel($id)->delete();

            return $this->redirect(['index']);
        }else{
            throw new ForbiddenHttpException('Action is not Allowed');
        }
        
    }

    /**
     * Finds the County model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return County the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = County::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
