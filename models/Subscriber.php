<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_subscriber".
 *
 * @property int $id
 * @property string|null $TransactionTime
 * @property int|null $Interface
 * @property string|null $Nationality
 * @property string|null $IDNumber
 * @property string|null $FullName
 * @property string|null $DateofBirth
 * @property int|null $Gender
 * @property string|null $Address
 * @property int|null $SIMType
 * @property string|null $MSISDN
 * @property int|null $DealerID
 *
 * @property TblDealer $dealer
 */
class Subscriber extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_subscriber';
    }
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // TransactionTime (date picker)
            // ['TransactionTime', 'date', 'format' => 'php:Y-m-d H:i:s', 'message' => 'The format of Transaction Time is invalid.'],
        
            // Interface (combo box) --> 0:SMS, 1:USSD
            ['Interface', 'in', 'range' => [0, 1], 'message' => 'Invalid interface value'],
        
            // Nationality (textbox)
            ['Nationality', 'string', 'max' => 20, 'tooLong' => 'Nationality should contain at most 20 characters'],
        
            // IDNumber (textbox)
            ['IDNumber', 'string', 'max' => 50, 'tooLong' => 'IDNumber should contain at most 50 characters'],
        
            // FullName (textbox)
            ['FullName', 'string', 'max' => 50, 'tooLong' => 'FullName should contain at most 50 characters'],
        
            // DateofBirth (date picker)
            // ['DateofBirth', 'date', 'format' => 'php:Y-m-d', 'message' => 'The format of Date of Birth is invalid.'],
        
            // Gender (combo box) --> 0:female, 1:male
            ['Gender', 'in', 'range' => [0, 1], 'message' => 'Invalid gender value'],
        
            // Address (text area)
            ['Address', 'string', 'max' => 100, 'tooLong' => 'Address should contain at most 100 characters'],
        
            // SIMType (combo box) --> 0:personal, 1:coorporate
            ['SIMType', 'in', 'range' => [0, 1], 'message' => 'Invalid SIMType value'],
        
            // MSISDN (text box) --> filled with phone number, with validation must be number
            ['MSISDN', 'match', 'pattern' => '/^0|62\d{9,19}$/', 'message' => 'Invalid phone number'],
        
            // DealerID (combo box) --> foreign key from tbl_dealer.dealer_id
            ['DealerID', 'exist', 'skipOnError' => true, 'targetClass' => TblDealer::class, 'targetAttribute' => ['DealerID' => 'dealer_id'], 'message' => 'Invalid DealerID'],
            
            [['TransactionTime', 'Interface', 'Nationality', 'IDNumber', 'FullName', 'DateofBirth', 'Gender', 'Address', 'SIMType', 'MSISDN', 'DealerID'], 'required'],
        // [['TransactionTime', 'DateofBirth'], 'date', 'format' => 'yyyy-MM-dd HH:mm:ss'],
        [['Interface', 'Gender', 'SIMType'], 'integer'],
        [['Nationality', 'IDNumber', 'FullName', 'Address'], 'string', 'max' => 255],
        [['MSISDN'], 'string', 'max' => 20],
        [['MSISDN'], 'number'],
        ['MSISDN', 'match', 'pattern' => '/^(0|62)\d+$/', 'message' => 'Phone number must start with 0 or 62.'],
        ];
        
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'TransactionTime' => 'Transaction Time',
            'Interface' => 'Interface',
            'Nationality' => 'Nationality',
            'IDNumber' => 'Id Number',
            'FullName' => 'Full Name',
            'DateofBirth' => 'Dateof Birth',
            'Gender' => 'Gender',
            'Address' => 'Address',
            'SIMType' => 'Sim Type',
            'MSISDN' => 'Msisdn',
            'DealerID' => 'Dealer ID',
        ];
    }

    /**
     * Gets query for [[Dealer]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDealer()
    {
        return $this->hasOne(TblDealer::class, ['dealer_id' => 'DealerID']);
    }
}
