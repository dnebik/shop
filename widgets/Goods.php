<?php


namespace app\widgets;

use yii\base\Widget;

class Goods extends Widget
{

    public $goods;

    public function run(){
        return $this->render("goods", ["goods" => $this->goods]);
    }

}