<?php

namespace app\models;

use yii\db\ActiveRecord;

class Dealers extends ActiveRecord
{
    public static function tableName()
    {
        return 'tbl_dealer';
    }

    public function rules()
    {
        return [
            [['dealer_name', 'description'], 'required'],
            [['dealer_name'], 'string', 'max' => 255],
            [['description'], 'string'],
        ];
    }
}
