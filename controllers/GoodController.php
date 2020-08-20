<?php


namespace app\controllers;


use app\models\Good;
use yii\web\Controller;

class GoodController extends Controller
{

    public function actionIndex($name) {
        $good = Good::getGoodByLink($name);
        return $this->render("index", ["good" => $good]);
    }

}