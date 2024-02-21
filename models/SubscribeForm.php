<?php
namespace app\models;

use Yii;
use yii\base\Model;

class SubscribeForm extends Model
{
    public $TransactionTime;
    public $Interface;
    public $Nationality;
    public $IDNumber;
    public $FullName;
    public $DateofBirth;
    public $Gender;
    public $Address;
    public $SIMType;
    public $MSISDN;
    public $DealerID;

    public function rules()
    {
        return [
            [['TransactionTime', 'Interface', 'Nationality', 'IDNumber', 'FullName', 'DateofBirth', 'Gender', 'Address', 'SIMType', 'MSISDN', 'DealerID'], 'required'],
            [['TransactionTime', 'DateofBirth'], 'date'],
            [['Interface', 'Gender', 'SIMType'], 'integer'],
            [['Nationality', 'IDNumber', 'FullName', 'Address'], 'string', 'max' => 255],
            [['MSISDN'], 'string', 'max' => 20],
            [['MSISDN'], 'number'],
            
        ];
    }
}
