<?php

namespace app\controllers;

use Yii;
use app\models\OficiosNew;
use app\models\OficiosNewSearch;
use app\models\OficiosNewVencendo;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OficiosNewController implements the CRUD actions for OficiosNew model.
 */
class OficiosNewController extends Controller
{
    /**
     * {@inheritdoc}
     */
    
    protected $voltaUrl;

    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'only' => ['create', 'update', 'delete'],
                'rules' => [
                    [
                        'allow' => true,                        
                        'roles' => ['@']
                    ],      
                ],
            ],
            
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all OficiosNew models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OficiosNewSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination = ['pageSize' => 12];

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single OficiosNew model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        //$this->voltaUrl = \yii::$app->request->referrer; 
        //echo $this->voltaUrl;
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);        
    }

    /**
     * Creates a new OficiosNew model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new OficiosNew();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->CodigoDaFicha]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing OficiosNew model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->CodigoDaFicha]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing OficiosNew model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(\Yii::$app->request->referrer); // foi retirado o botão apagar do update view
        //return $this->redirect(\yii\helpers\Url::to(['oficios-new/index'])); ;;;
        //exemplo: return $this->goBack((!empty(Yii::$app->request->referrer) ? Yii::$app->request->referrer : null));
        //return $this->redirect(\yii\helpers\Url::to($url));    
    }

//    Esta função mostra os registros vencendo entre hoje e os próximos seis dias
    public function actionVencendo()
    {
        $searchModel = new OficiosNewVencendo();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination = ['pageSize' => 12];

        return $this->render('vencendo', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
       
    /**
     * Finds the OficiosNew model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return OficiosNew the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = OficiosNew::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
