<?php

namespace app\controllers;

use Yii;
use app\models\RegistrationCenter;
use app\models\User;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * RegistrationCenterController implements the CRUD actions for RegistrationCenter model.
 */
class RegistrationCenterController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                //'only' => ['logout', 'signup''request-password-reset', 'reset-password', 'verify-email',],
                'rules' => [
                    [
                        'actions' => ['signup', 'error', 'login',],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout', 'error','index','create', 'view','update','delete','figs'],
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

    public function actionFigs($id) {
        // $id
        $posts = \app\models\Constituency::find()
                ->where(['CountyID' => $id])
                ->orderBy('ConstituencyID DESC')
                ->all();
                //echo "<select name='secondary'>";
        if (!empty($posts)) {
            echo "<option value=''>Select Constituency</option>";
            foreach ($posts as $poster) {
                echo  "<option value='" . $poster->ConstituencyID . "'>" . $poster->ConstituencyName . "</option>";
            }
        } else {
            echo "<option>-</option>";
        }
        //echo "</select>";
    }

    /**
     * Lists all RegistrationCenter models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (\Yii::$app->user->can('index-center')) {
            # code...
            $center = RegistrationCenter::findOne(['RegistrationCenterID'=>Yii::$app->user->identity->RegistrationCenterID]);
            if (!empty($center) && $center->RegistrationCenterType == 'Office of Registrar of Births and Deaths') {
                # code...
                $dataProvider = new ActiveDataProvider([
                        'query' => RegistrationCenter::find(),
                    ]);

                    return $this->render('index', [
                        'dataProvider' => $dataProvider,
                ]);
            }elseif (!empty($center) && ($center->RegistrationCenterType == 'Hospital' or $center->RegistrationCenterType == 'Police Station' or $center->RegistrationCenterType == 'Dispensary')) {
                # code...
                $dataProvider = new ActiveDataProvider([
                        'query' => RegistrationCenter::find()->where(['RegistrationCenterID'=>Yii::$app->user->identity->RegistrationCenterID]),
                    ]);

                    return $this->render('index', [
                        'dataProvider' => $dataProvider,
                ]);
            }else{
                //error message to be displayed
                Yii::$app->session->setFlash('message', "Kindly register your center before proceeding");
                return $this->redirect(Yii::$app->request->referrer);
            }
        }else{
            throw new ForbiddenHttpException('Action is not Allowed');
        }
        
    }

    /**
     * Displays a single RegistrationCenter model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if (\Yii::$app->user->can('view-center')) {
            # code...
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }else{
            throw new ForbiddenHttpException('Action is not Allowed');
        }
        
    }

    /**
     * Creates a new RegistrationCenter model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (\Yii::$app->user->can('create-center')) {
            # code...
            $model = new RegistrationCenter();
           if ( $model->load(Yii::$app->request->post())){

                $model->RegisteredBy = Yii::$app->user->identity->id;
                $model->RegistrationDate = date('Y-m-d');
                //var_dump($model['CountyID']).exit();
                $county = $model['CountyID'];
                $constituency =$model['ConstituencyID'];
                $RegistrationCenterType = $model['RegistrationCenterType'];
                $RegistrationCenterName = $model['RegistrationCenterName'];
                $search = RegistrationCenter::find()->where(['CountyID' => $county,'ConstituencyID'=>$constituency,'RegistrationCenterType'=>$RegistrationCenterType,'RegistrationCenterName'=>$RegistrationCenterName])->all();
                if (!empty($search)) {
                    # code...
                    //error message to be displayed
                    Yii::$app->session->setFlash('message', "Registration Center Already Exists");
                    return $this->redirect(Yii::$app->request->referrer);
                }elseif(empty($search)){
                    if($model->save()){
                        $user = User::findOne(Yii::$app->user->identity->id);
                        $user->RegistrationCenterID = $model->RegistrationCenterID;
                        if ($user->save()) {
                            # code...
                            return $this->redirect(['view', 'id' => $model->RegistrationCenterID]);
                        }else{
                            var_dump($model->getErrors()).exit();
                        }
                    }else{
                        var_dump($model->getErrors()).exit();
                    }

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
     * Updates an existing RegistrationCenter model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if (\Yii::$app->user->can('update-center')) {
            # code...
            $model = $this->findModel($id);

            if ( $model->load(Yii::$app->request->post())){

                $model->RegistrationUpdatedBy = Yii::$app->user->identity->id;
                $model->RegistrationUpdatedDate = date('Y-m-d');
                $county = $model['CountyID'];
                $constituency =$model['ConstituencyID'];
                $RegistrationCenterType = $model['RegistrationCenterType'];
                $RegistrationCenterName = $model['RegistrationCenterName'];
                $search = RegistrationCenter::find()->where(['CountyID' => $county,'ConstituencyID'=>$constituency,'RegistrationCenterType'=>$RegistrationCenterType,'RegistrationCenterName'=>$RegistrationCenterName])->all();
                if (!empty($search)) {
                    # code...
                    //error message to be displayed
                    Yii::$app->session->setFlash('message', "Registration Center Already Exists");
                    return $this->redirect(Yii::$app->request->referrer);
                }elseif(empty($search)){
                    if($model->save()){
                        $user = User::findOne(Yii::$app->user->identity->id);
                        $user->RegistrationCenterID = $model->RegistrationCenterID;
                        if ($user->save()) {
                            # code...
                            return $this->redirect(['view', 'id' => $model->RegistrationCenterID]);
                        }else{
                            var_dump($model->getErrors()).exit();
                        }
                    }else{
                        var_dump($model->getErrors()).exit();
                    }

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
     * Deletes an existing RegistrationCenter model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if (\Yii::$app->user->can('delete-center')) {
            # code...
            $this->findModel($id)->delete();

            return $this->redirect(['index']);
        }else{
            throw new ForbiddenHttpException('Action is not Allowed');
        }
    }

    /**
     * Finds the RegistrationCenter model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return RegistrationCenter the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = RegistrationCenter::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
