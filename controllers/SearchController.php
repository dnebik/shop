<?php


namespace app\controllers;

use app\models\Good;
use yii\web\Controller;

class SearchController extends Controller
{
    public function actionIndex($value = null) {
        $goods = null;
        if ($value){
            $value = htmlspecialchars($value);
            $goods = Good::find()->filterWhere(['like', "name", $value])->all();
        }
        return $this->render("index", ["goods" => $goods, "value" => $value]);
    }
}