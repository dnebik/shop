<?php


namespace app\models;

use yii\db\ActiveRecord;

class Category extends ActiveRecord
{
    public static function tableName()
    {
        return 'category';
    }

    public function getGood(){
        return $this->hasMany(Good::className(), ["category_id" => "id"]);
    }
}