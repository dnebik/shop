<?php


namespace app\models;
use yii\db\ActiveRecord;

class Cart extends ActiveRecord
{

    public static function addToCart($good) {
        if (!$_SESSION['cart'][$good->id]) {
            $_SESSION['cart'][$good->id] = [
                'name' => $good->name,
                'img' => $good->img,
                'price' => $good->price,
                'count' => 1,
            ];
        } else {
            $_SESSION['cart'][$good->id]['count']++;
        }
    }

    public static function removeFromCart($good) {
        if ($_SESSION['cart'][$good->id]) {
            if ($_SESSION['cart'][$good->id]['count'] == 1) {
                unset($_SESSION['cart'][$good->id]);
            } else {
                $_SESSION['cart'][$good->id]['count'] -= 1;
            }
        }
    }

    public static function getFullPrice() {
        $finalPrice = 0;
        foreach ($_SESSION['cart'] as $item) {
            $price = $item['price'] * $item['count'];
            $finalPrice += $price;
        }
        return $finalPrice;
    }

    public static function getFullCount() {
        $count = 0;
        if ($_SESSION['cart'])
        foreach ($_SESSION['cart'] as $item) {
            $count += $item['count'];
        }
        return $count;
    }

}