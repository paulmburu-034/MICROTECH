<?php

namespace app\controllers;

use Yii;
use app\models\AuthAssignment;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * AuthAssignmentController implements the CRUD actions for AuthAssignment model.
 */
class AuthAssignmentController extends Controller
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
     * Lists all AuthAssignment models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (\Yii::$app->user->can('auth-assignment')) {
            # code...
            $dataProvider = new ActiveDataProvider([
                'query' => AuthAssignment::find(),
            ]);

            return $this->render('index', [
                'dataProvider' => $dataProvider,
            ]);
        }else{
            throw new ForbiddenHttpException('Action is not Allowed');
        }
        
    }

    /**
     * Displays a single AuthAssignment model.
     * @param string $item_name
     * @param string $user_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($item_name, $user_id)
    {
        if (\Yii::$app->user->can('view-auth-assignment')) {
            # code...
            return $this->render('view', [
                'model' => $this->findModel($item_name, $user_id),
            ]);
        }else{
            throw new ForbiddenHttpException('Action is not Allowed');
        }
        
    }

    /**
     * Creates a new AuthAssignment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (\Yii::$app->user->can('create-auth-assignment')) {
            # code...
            $model = new AuthAssignment();

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'item_name' => $model->item_name, 'user_id' => $model->user_id]);
            }

            return $this->render('create', [
                'model' => $model,
            ]);
        }else{
            throw new ForbiddenHttpException('Action is not Allowed');
        }

    }

    /**
     * Updates an existing AuthAssignment model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $item_name
     * @param string $user_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($item_name, $user_id)
    {
        if (\Yii::$app->user->can('update-auth-assignment')) {
            # code...
            $model = $this->findModel($item_name, $user_id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'item_name' => $model->item_name, 'user_id' => $model->user_id]);
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        }else{
            throw new ForbiddenHttpException('Action is not Allowed');
        }
        
    }

    /**
     * Deletes an existing AuthAssignment model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $item_name
     * @param string $user_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($item_name, $user_id)
    {
        if (\Yii::$app->user->can('delete-auth-assignment')) {
            # code...
            $this->findModel($item_name, $user_id)->delete();

            return $this->redirect(['index']);
        }else{
            throw new ForbiddenHttpException('Action is not Allowed');
        }
        
    }

    /**
     * Finds the AuthAssignment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $item_name
     * @param string $user_id
     * @return AuthAssignment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($item_name, $user_id)
    {
        if (($model = AuthAssignment::findOne(['item_name' => $item_name, 'user_id' => $user_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
