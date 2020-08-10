<?php

namespace backend\controllers;

use Yii;
use backend\models\BirthDetails;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BirthDetailsController implements the CRUD actions for BirthDetails model.
 */
class BirthDetailsController extends Controller
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

    public function actionLists($id)
    {               
        $posts = \backend\models\Constituency::find()
                ->where(['CountyID' => $id])
                ->orderBy('ConstituencyID DESC')
                ->all();
                
        if (!empty($posts)) {
            echo "<option>Select Constituency</option>";
            foreach($posts as $post) {
                echo "<option value='".$post->ConstituencyID."'>".$post->ConstituencyName."</option>";
            }
        } else {
            echo "<option>-</option>";
        }
        
    }

    public function actionFigs($id) {
        // $id
        $posts = Constituency::find()
                ->where(['CountyID' => $id])
                ->orderBy('ConstituencyID DESC')
                ->all();
                //echo "<select name='secondary'>";
        if (!empty($posts)) {
            echo "<option value=''>Select Category of Complaint</option>";
            foreach ($posts as $poster) {
                echo  "<option value='" . $poster->ConstituencyID . "'>" . $poster->ConstituencyName . "</option>";
            }
        } else {
            echo "<option>-</option>";
        }
        //echo "</select>";
    }

    /**
     * Lists all BirthDetails models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => BirthDetails::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BirthDetails model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new BirthDetails model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BirthDetails();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->PersonID]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing BirthDetails model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->PersonID]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing BirthDetails model.
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
     * Finds the BirthDetails model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BirthDetails the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BirthDetails::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
