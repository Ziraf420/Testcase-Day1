<?php

namespace app\models;

use Yii;
use yii\base\Model;

class DealerForm extends Model
{
    public $name;
    public $email;

    public function rules()
    {
        return [
            [['dealer_name', 'email'], 'required'],
            ['description', 'email'],
        ];
    }
}