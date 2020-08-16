<?php


namespace app\models;


use yii\db\ActiveRecord;

class Good extends ActiveRecord
{

    public static function tableName(){
        return 'good';
    }

    public function getCategory(){
        return $this->hasOne(Category::className(), ["id" => "category_id"]);
    }
}