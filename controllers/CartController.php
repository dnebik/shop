<?php


namespace app\controllers;
use app\models\Good;
use http\Encoding\Stream;
use yii\web\Controller;
use app\models\Cart;
use Yii;

class CartController extends Controller
{

    public function actionOpen() {
        $session = Yii::$app->session;
        $session->open();

        return $this->renderPartial("cart", ['session' => $session]);
    }

    public function actionClear() {
        $session = Yii::$app->session;
        $session->open();
        $session->remove('cart');

        return $this->renderPartial("cart", ['session' => $session]);
    }

    public function actionRemove($id) {

        $good = Good::getGoodById($id);
        error_log("good");

        $session = Yii::$app->session;
        $session->open();

        Cart::removeFromCart($good);

        error_log("cart");
        return $this->renderPartial("cart", ['session' => $session]);
    }

    public function actionAdd(string $name) {
        $good = Good::getGoodByLink($name);

        $session = Yii::$app->session;
        $session->open();

        Cart::addToCart($good);

        return $this->renderPartial("cart", ['session' => $session]);
    }

}