<?php


namespace app\controllers;

use app\models\Category;
use app\models\Good;
use yii\web\Controller;

class CategoryController extends Controller
{

    public function actionIndex($type = 0){
        $categorys = Category::find()->all();
        if (!$type) {
            $goods = Good::find()->all();
        } else {
            $goods = Good::find()
                ->joinWith('category')
                ->where(["cat_name" => $type])
                ->all();
        }
        return $this->render("index", ["goods" => $goods, "categorys" => $categorys]);
    }

    public function actionSearch($search = null){
        error_log("$search");
        $value = htmlspecialchars($search);
        $goods = Good::find()->filterWhere(['like', "name", $value])->all();
        error_log(var_export($goods, true));
        return $this->render("search", ["goods" => $goods, "value" => $value]);
    }

}