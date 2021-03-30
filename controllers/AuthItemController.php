<?php

namespace app\controllers;

use Yii;
use yii\web\ForbiddenHttpException;
use app\models\AuthItem;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * AuthItemController implements the CRUD actions for AuthItem model.
 */
class AuthItemController extends Controller
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
                        'actions' => ['logout', 'error','index','create', 'view','update','delete'],
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
     * Lists all AuthItem models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (\Yii::$app->user->can('auth-item-index')) {
            # code...
            $dataProvider = new ActiveDataProvider([
                'query' => AuthItem::find(),
            ]);

            return $this->render('index', [
                'dataProvider' => $dataProvider,
            ]);
        }
        else{
            throw new ForbiddenHttpException('Action is not Allowed');
        }
    }

    /**
     * Displays a single AuthItem model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if (\Yii::$app->user->can('view-auth-item')) {
            # code...
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
        else{
            throw new ForbiddenHttpException('Action is not Allowed');
        }
        
    }
    public function actionTest()
    {
        return $this->render('test', [
        ]);
    }


    /**
     * Creates a new AuthItem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (\Yii::$app->user->can('create-auth-item')) {
            # code...
            $model = new AuthItem();

            if($model->load(Yii::$app->request->post())){
                $model->created_at = Yii::$app->user->identity->id;
                if ($model->save()) {
                    return $this->redirect(['view', 'id' => $model->name]);
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
     * Updates an existing AuthItem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if (\Yii::$app->user->can('update-auth-item')) {
            # code...
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post())) {
                # code...
                $model->updated_at = Yii::$app->user->identity->id;
                if ($model->save()) {
                    return $this->redirect(['view', 'id' => $model->name]);
                }else{
                    var_dump($model->getErrors()).exit();
                }
            }


            return $this->render('update', [
                'model' => $model,
            ]);
        }
        else{
            throw new ForbiddenHttpException('Action is not Allowed');
        }
        
    }

    /**
     * Deletes an existing AuthItem model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if (\Yii::$app->user->can('delete-auth-item')) {
            # code...
            $this->findModel($id)->delete();

            return $this->redirect(['index']);
        }else{
            throw new ForbiddenHttpException('Action is not Allowed');
        }
        
    }

    /**
     * Finds the AuthItem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return AuthItem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AuthItem::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
