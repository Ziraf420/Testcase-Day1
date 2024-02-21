<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_dealer".
 *
 * @property int $dealer_id
 * @property string|null $dealer_name
 * @property string|null $description
 *
 * @property TblSubscriber[] $tblSubscribers
 */
class TblDealer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_dealer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dealer_name'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'dealer_id' => 'Dealer ID',
            'dealer_name' => 'Dealer Name',
            'description' => 'Description',
        ];
    }

    /**
     * Gets query for [[TblSubscribers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblSubscribers()
    {
        return $this->hasMany(TblSubscriber::class, ['DealerID' => 'dealer_id']);
    }
}
