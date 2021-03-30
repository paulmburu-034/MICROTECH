<?php

namespace app\controllers;

use Yii;
use app\models\Constituency;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;

/**
 * ConstituencyController implements the CRUD actions for Constituency model.
 */
class ConstituencyController extends Controller
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
     * Lists all Constituency models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (\Yii::$app->user->can('constituency-index')) {
        # code...
            $dataProvider = new ActiveDataProvider([
                'query' => Constituency::find(),
            ]);

            return $this->render('index', [
                'dataProvider' => $dataProvider,
            ]);
        }else{
            throw new ForbiddenHttpException('Action is not Allowed');
        }
        
    }

    /**
     * Displays a single Constituency model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if (\Yii::$app->user->can('view-constituency')) {
        # code...
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }else{
            throw new ForbiddenHttpException('Action is not Allowed');
        }
    }

    /**
     * Creates a new Constituency model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (\Yii::$app->user->can('create-constituency')) {
        # code...
            $model = new Constituency();

            if ($model->load(Yii::$app->request->post())){
                $constituency = $model["ConstituencyName"];
                $constituency_search = Constituency::findOne(['ConstituencyName'=>$constituency]);
                if (!empty($constituency_search)) {
                    # code...
                    Yii::$app->session->setFlash('message', "Constituency already exists");
                }else if(empty($constituency_search)){
                    if ($model->save()) {
                        return $this->redirect(['view', 'id' => $model->ConstituencyName]);
                    }

                }else{
                    Yii::$app->session->setFlash('message', "Contact System Administrator for support");
                }
                //var_dump($model["ConstituencyName"]).exit();
            } 

            return $this->render('create', [
                'model' => $model,
            ]);
        }else{
            throw new ForbiddenHttpException('Action is not Allowed');
        }
        
    }

    /**
     * Updates an existing Constituency model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if (\Yii::$app->user->can('update-constituency')) {
        # code...
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post())){
                $constituency = $model["ConstituencyName"];
                $constituency_search = Constituency::findOne(['ConstituencyName'=>$constituency]);
                if (!empty($constituency_search)) {
                    # code...
                    Yii::$app->session->setFlash('message', "Constituency already exists");
                }else if(empty($constituency_search)){
                    if ($model->save()) {
                        return $this->redirect(['view', 'id' => $model->ConstituencyName]);
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
     * Deletes an existing Constituency model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if (\Yii::$app->user->can('delete-constituency')) {
        # code...
            $this->findModel($id)->delete();

            return $this->redirect(['index']);
        }else{
            throw new ForbiddenHttpException('Action is not Allowed');
        }
        
    }

    /**
     * Finds the Constituency model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Constituency the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Constituency::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
