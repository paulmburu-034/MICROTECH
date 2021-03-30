<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\BirthDetails;
use app\models\DeathDetails;
use app\models\Certificates;
use kartik\mpdf\Pdf;

/**
 *  CertificatesController implements the CRUD actions for Certificates model.
 */
class CertificatesController extends Controller
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
                        'actions' => ['logout', 'error','search-birth','search-death','print-birth','print-death'],
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

    public function actionSearchBirth()
    {
    	# code...
        if (\Yii::$app->user->can('search-birth')) {
            # code...
            $data = Yii::$app->request->post();
            $model = new Certificates();
             if ($model->load($data)) {
                # code...
                $personid = $data['Certificates']['PersonID'];
                $person = BirthDetails::findOne(['BirthCertNo'=>$personid]);
                if (!empty($person)) {
                    # code...
                    //var_dump($person->FullName).exit();
                    return $this->render('birth_summary', [
                        'person' => $person,
                    ]);
                }else{
                    //error message to be displayed
                    Yii::$app->session->setFlash('message', " ".$personid." Does not exist");
                }
            }
            return $this->render('search_birth',[
                'model'=>$model
            ]);
        }else{
            throw new ForbiddenHttpException('Action is not Allowed');
        }
    	
    }

    public function actionSearchDeath()
    {
    	# code...
        if (\Yii::$app->user->can('search-death')) {
            # code...
            $data = Yii::$app->request->post();
            $model = new Certificates();
             if ($model->load($data)) {
                # code...
                $personid = $data['Certificates']['PersonID'];
                $person = BirthDetails::findOne(['BirthCertNo'=>$personid]);
                if (!empty($person)) {
                    # code...
                    //var_dump($person->FullName).exit();
                    return $this->render('death_summary', [
                        'person' => $person,
                    ]);
                }else{
                    //error message to be displayed
                    Yii::$app->session->setFlash('message', " ".$personid." Does not exist");
                }
            }
            return $this->render('search_death',[
                'model'=>$model
            ]);
        }else{
            throw new ForbiddenHttpException('Action is not Allowed');
        }
    	
    }

    public function actionPrintBirth($id)
    {
    	# code...
        if (\Yii::$app->user->can('print-birth')) {
            # code...
            //finding the birth summary is being done for.
            $model = BirthDetails::findOne(['BirthCertNo' => $id]);
            //initializing content to be printed.
            $content = $this->renderPartial('birth',['model'=>$model]);

            // setup kartik\mpdf\Pdf component
            $pdf = new Pdf([
                // set to use core fonts only
                'mode' => Pdf::MODE_CORE,
                // A4 paper format
                'format' => Pdf::FORMAT_A4,
                // portrait orientation
                'orientation' => Pdf::ORIENT_LANDSCAPE,
                // stream to browser inline
                'destination' => Pdf::DEST_BROWSER,
                // your html content input
                'content' => $content,
                // format content from your own css file if needed or use the
                // enhanced bootstrap css built by Krajee for mPDF formatting
                'cssFile' => '@vendor/kartik-v/yii2-mpdf/src/assets/kv-mpdf-bootstrap.min.css',
                // any css to be embedded if required
                'cssInline' => '.kv-heading-1{font-size:18px}',
                 // set mPDF properties on the fly
                'options' => ['title' => 'Birth Details - Birth Certificate No: '.$model->BirthCertNo],
                 // call mPDF methods on the fly
                'methods' => [
                    // 'SetHeader'=>['Birth Details - Birth Certificate No: '.$model->BirthCertNo],
                    // 'SetFooter'=>['{PAGENO}'],
                ],
                'filename' => 'Birth Details - Birth Certificate No: '.$model->BirthCertNo,
                // 'marginHeader' => 5,
            ]);

            // return the pdf output as per the destination setting
            return $pdf->render();
        }else{
            throw new ForbiddenHttpException('Action is not Allowed');
        }
    	
    }

    public function actionPrintDeath($id)
    {
    	# code...
        if (\Yii::$app->user->can('print-death')) {
            # code...
            //finding the death summary is being done for.
            $model = BirthDetails::findOne(['BirthCertNo' => $id]);

            //$death_details = DeathDetails::findOne($id);
            //initializing content to be printed.
            $content = $this->renderPartial('death',['model'=>$model]);

            // setup kartik\mpdf\Pdf component
            $pdf = new Pdf([
                // set to use core fonts only
                'mode' => Pdf::MODE_CORE,
                // A4 paper format
                'format' => Pdf::FORMAT_A4,
                // portrait orientation
                'orientation' => Pdf::ORIENT_LANDSCAPE,
                // stream to browser inline
                'destination' => Pdf::DEST_BROWSER,
                // your html content input
                'content' => $content,
                // format content from your own css file if needed or use the
                // enhanced bootstrap css built by Krajee for mPDF formatting
                'cssFile' => '@vendor/kartik-v/yii2-mpdf/src/assets/kv-mpdf-bootstrap.min.css',
                // any css to be embedded if required
                'cssInline' => '.kv-heading-1{font-size:18px}',
                 // set mPDF properties on the fly
                'options' => ['title' => 'Death Details - Death Certificate No: '.$model->BirthCertNo],
                 // call mPDF methods on the fly
                'methods' => [
                    // 'SetHeader'=>['Death Details - Death Certificate No: '.$model->DeathCertNo],
                    // 'SetFooter'=>['{PAGENO}'],
                ],
                'filename' => 'Death Details - Death Certificate No: '.$model->BirthCertNo,
                // 'marginHeader' => 5,
            ]);

            // return the pdf output as per the destination setting
            return $pdf->render();
        }else{
            throw new ForbiddenHttpException('Action is not Allowed');
        }
    	
    }
}