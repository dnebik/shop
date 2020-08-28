<?php


namespace app\controllers;
use app\models\Good;
use app\models\Order;
use app\models\OrderGood;
use http\Encoding\Stream;
use yii\helpers\Url;
use yii\web\Controller;
use app\models\Cart;
use Yii;

class CartController extends Controller
{
    public function actionOrder(){
        $session = Yii::$app->session;
        $session->open();

        if (!$session["cart"]) {
            return Yii::$app->response->redirect(Url::to("/"));
        }

        $order = new Order();
        if ($order->load(Yii::$app->request->post())) {
            $order->sum = Cart::getFullPrice();
            if ($order->save()) {
                $id = $order->id;
                $this->saveOrderInfo($session['cart'], $id);
                Yii::$app->mailer->compose("order", ["session" => $session, "id" => $id])
                    ->setFrom(['dneb97@mail.ru' => 'Sushi'])
                    ->setTo($order->email)
                    ->setSubject("Ваш заказ")
                    ->send();

                $session->remove('cart');
                return $this->render('success', ["id" => $id]);
            }
        }

        $this->layout = 'empty_layout';
        return $this->render('order', ['order' => $order]);
    }

    public function actionOpen() {
        $session = Yii::$app->session;
        $session->open();

        return $this->renderPartial("cart", ['session' => $session]);
    }

    protected function saveOrderInfo($goods, $orderId) {

        foreach ($goods as $id => $item) {
            $orderInfo = new OrderGood();
            $orderInfo->order_id = $orderId;
            $orderInfo->good_id = $id;
            $orderInfo->name = $item['name'];
            $orderInfo->price = $item['price'];
            $orderInfo->quantity = $item['count'];
            $orderInfo->sum = $item['count'] * $item['price'];
            $orderInfo->save();
        }
    }

    public function actionClear() {
        $session = Yii::$app->session;
        $session->open();

        Cart::clearCart();

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

    public function actionAdd($name) {
        $good = Good::getGoodByLink($name);

        $session = Yii::$app->session;
        $session->open();

        Cart::addToCart($good);

        return $this->renderPartial("cart", ['session' => $session]);
    }

}