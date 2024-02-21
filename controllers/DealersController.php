<?php

namespace app\controllers;

use app\models\Dealers;
use app\models\DealersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DealersController implements the CRUD actions for Dealers model.
 */
class DealersController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Dealers models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new DealersSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Dealers model.
     * @param int $dealer_id
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($dealer_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($dealer_id),
        ]);
    }

    /**
     * Creates a new Dealers model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Dealers();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'dealer_id' => $model->dealer_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Dealers model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $dealer_id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($dealer_id)
    {
        $model = $this->findModel($dealer_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'dealer_id' => $model->dealer_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Dealers model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $dealer_id
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($dealer_id)
    {
        $this->findModel($dealer_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Dealers model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $dealer_id
     * @return Dealers the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($dealer_id)
    {
        if (($model = Dealers::findOne(['dealer_id' => $dealer_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
