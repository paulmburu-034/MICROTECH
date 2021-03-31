<?php

namespace app\controllers;

use Yii;
use app\models\DeathDetails;
use app\models\BirthDetails;
use app\models\NumberSeries;
use app\models\RegistrationCenter;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * DeathDetailsController implements the CRUD actions for DeathDetails model.
 */
class DeathDetailsController extends Controller
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
                        'actions' => ['logout', 'error','index','create', 'view','update','delete','test'],
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

    /**
     * Lists all DeathDetails models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (\Yii::$app->user->can('death-details-index')) {
        # code...
            # code...
            $center = RegistrationCenter::findOne(['RegistrationCenterID'=>Yii::$app->user->identity->RegistrationCenterID]);
            if (!empty($center) && $center->RegistrationCenterType == 'Office of Registrar of Births and Deaths') {
                # code...
                $dataProvider = new ActiveDataProvider([
                        'query' => DeathDetails::find(),
                    ]);

                    return $this->render('index', [
                        'dataProvider' => $dataProvider,
                ]);
            }elseif (!empty($center) && ($center->RegistrationCenterType == 'Hospital' or $center->RegistrationCenterType == 'Police Station' or $center->RegistrationCenterType == 'Dispensary')) {
                # code...
                $dataProvider = new ActiveDataProvider([
                        'query' => DeathDetails::find()->where(['RegistrationCenterID'=>Yii::$app->user->identity->RegistrationCenterID]),
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
     * Displays a single DeathDetails model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if (\Yii::$app->user->can('view-death')) {
            # code...
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }else{
            throw new ForbiddenHttpException('Action is not Allowed');
        }
        
    }
    public function actionCreate()
    {
        # code...
        if (\Yii::$app->user->can('death-search')) {
            # code...
            $model = new DeathDetails();
            $data = Yii::$app->request->post();
            if ($model->load($data)) {
                # code...
                $personid = $data['DeathDetails']['PersonID'];
                $person = BirthDetails::findOne(['BirthCertNo'=>$personid]);
                if (!empty($person) && $person->IsDead == 0) {
                    # code...
                    //var_dump($person->FullName).exit();
                    return $this->render('search', [
                        'model' => $model,
                        'person' => $person,
                    ]);
                }elseif (!empty($person) && $person->IsDead == 1) {
                    # code...                    
                    //error message to be displayed
                    Yii::$app->session->setFlash('message', "Death of Person with BirthCertNo: ".$personid." already entered. Consider updating");
                }
                else{
                    //error message to be displayed
                    Yii::$app->session->setFlash('message', " ".$personid." Does not exist");
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
     * Creates a new DeathDetails model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionTest()
    {
        if (\Yii::$app->user->can('create-death')) {
            # code...
            $model = new DeathDetails();
            $data = Yii::$app->request->post();
            if ($model->load(Yii::$app->request->post())) {
                $model->CreatedBy = Yii::$app->user->identity->id;
                $model->CreationDate = date('Y-m-d');
                $cert = $data["BirthDetails"]["BirthCertNo"];
                $model->PersonID = $cert;
                $record_year = date('Y',strtotime($model->CreationDate));
                $center = Yii::$app->user->identity->RegistrationCenterID;
                if (!empty($center)) {
                    # code...
                    $r_center = RegistrationCenter::findOne($center);
                    $model->CountyID = $r_center->CountyID;
                    $model->ConstituencyID = $r_center->ConstituencyID;
                    $model->RegistrationCenterID = $r_center->RegistrationCenterID;
                }else{
                    //error message to be displayed
                    Yii::$app->session->setFlash('message', "Kindly register your center before proceeding");
                    return $this->redirect(Yii::$app->request->referrer);
                }
                if (empty($model->DeathCertificateNo)) {
                    // code...
                    //generating number for Death Certificate Number
                    $number = NumberSeries::GenerateNumbers($module='DeathRegistration',$year=$record_year);
                }
                if (empty($number) && empty($model->DeathCertificateNo)) {
                    // code...
                    //redirecting to information form
                    return $this->render('create', [
                        'model' => $model,
                    ]);
                }else{
                    //generating reference number if it was Empty
                    if (empty($model->DeathCertificateNo)) {
                        // code...
                        //generating Death Certificate Number
                        $model->DeathCertificateNo = "DC/".$number."".date('/m/Y');
                    }
                    if ($model->save()) {
                        # code...
                        $cert_find = BirthDetails::findOne(['BirthCertNo'=>$cert]);
                        $cert_find->IsDead = 1;
                        if ($cert_find->save()) {
                            # code...
                            return $this->redirect(['view', 'id' => $model->ID]);
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
     * Updates an existing DeathDetails model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if (\Yii::$app->user->can('update-death')) {
            # code...
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->ID]);
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        }else{
            throw new ForbiddenHttpException('Action is not Allowed');
        }
        
    }

    /**
     * Deletes an existing DeathDetails model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if (\Yii::$app->user->can('delete-death')) {
            # code...
            $this->findModel($id)->delete();
            return $this->redirect(['index']);
        }else{
            throw new ForbiddenHttpException('Action is not Allowed');
        }
        
    }

    /**
     * Finds the DeathDetails model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DeathDetails the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DeathDetails::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
