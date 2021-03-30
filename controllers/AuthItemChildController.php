<?php

namespace app\controllers;

use Yii;
use app\models\AuthItemChild;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * AuthItemChildController implements the CRUD actions for AuthItemChild model.
 */
class AuthItemChildController extends Controller
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
     * Lists all AuthItemChild models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (\Yii::$app->user->can('auth-item-child')) {
            # code...
            $dataProvider = new ActiveDataProvider([
                'query' => AuthItemChild::find(),
            ]);

            return $this->render('index', [
                'dataProvider' => $dataProvider,
            ]);
        }else{
            throw new ForbiddenHttpException('Action is not Allowed');
        }
        
    }

    /**
     * Displays a single AuthItemChild model.
     * @param string $child
     * @param string $parent
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if (\Yii::$app->user->can('view-auth-item-child')) {
            # code...
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }else{
            throw new ForbiddenHttpException('Action is not Allowed');
        }
        
    }

    /**
     * Creates a new AuthItemChild model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (\Yii::$app->user->can('create-auth-item-child')) {
            # code...
            $model = new AuthItemChild();

            if ($model->load(Yii::$app->request->post())){

                $parent_role = $model['parent'];
                $child_role = $model['child'];

                $check_role = AuthItemChild::find()->where(['parent'=>$parent_role,'child'=>$child_role])->one();

                if (empty($check_role)) {
                    # code...
                    if ($model->save()) {
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                }else{
                    //error message to be displayed
                    Yii::$app->session->setFlash('message', " ".$child_role." Already mapped to ".$parent_role);
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
     * Updates an existing AuthItemChild model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $child
     * @param string $parent
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if (\Yii::$app->user->can('update-auth-item-child')) {
            # code...
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post())){

                $parent_role = $model['parent'];
                $child_role = $model['child'];

                $check_role = AuthItemChild::find()->where(['parent'=>$parent_role,'child'=>$child_role])->one();

                if (empty($check_role)) {
                    # code...
                    if ($model->save()) {
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                }else{
                    //error message to be displayed
                    Yii::$app->session->setFlash('message', " ".$child_role." Already mapped to ".$parent_role);
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
     * Deletes an existing AuthItemChild model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $child
     * @param string $parent
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if (\Yii::$app->user->can('delete-auth-item-child')) {
            # code...
            $this->findModel($id)->delete();

            return $this->redirect(['index']);
        }else{
            throw new ForbiddenHttpException('Action is not Allowed');
        }
        
    }

    /**
     * Finds the AuthItemChild model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $child
     * @param string $parent
     * @return AuthItemChild the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AuthItemChild::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
