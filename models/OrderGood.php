<?php


namespace app\models;


use yii\db\ActiveRecord;

class OrderGood extends ActiveRecord
{

    public static function tableName() {
        return "order_good";
    }

    public function getOrder()
    {
        return $this->hasOne(Order::class, ['id' => 'order_id']);
    }

}