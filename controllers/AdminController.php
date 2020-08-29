<?php

namespace app\controllers;

use app\models\LoginForm;
use Yii;
use app\models\Order;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class AdminController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
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

    public function actionLogin()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Order::find(),
        ]);

        $this->layout = "adminLayout";

        if (!Yii::$app->user->isGuest) {
            return $this->render('index', [
                'dataProvider' => $dataProvider,
            ]);
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->render('index', [
                'dataProvider' => $dataProvider,
            ]);
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionIndex()
    {
        if (Yii::$app->user->isGuest)
        {
            return $this->goHome();
        }

        $dataProvider = new ActiveDataProvider([
            'query' => Order::find(),
        ]);

        $this->layout = "adminLayout";
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        if (Yii::$app->user->isGuest)
        {
            return $this->goHome();
        }

        $this->layout = "adminLayout";
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

//    public function actionCreate()
//    {
//        $model = new Order();
//
//        $this->layout = "adminLayout";
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        }
//
//        return $this->render('create', [
//            'model' => $model,
//        ]);
//    }

    public function actionUpdate($id)
    {
        if (Yii::$app->user->isGuest)
        {
            return $this->goHome();
        }

        $model = $this->findModel($id);

        $this->layout = "adminLayout";

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        if (Yii::$app->user->isGuest)
        {
            return $this->goHome();
        }

        $this->findModel($id)->delete();
        $this->layout = "adminLayout";

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Order::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
