<?php

namespace common\models;

use frontend\components\behaviors\AccountTransferBehavior;
use Yii;

/**
 * This is the model class for table "account_transaction".
 *
 * @property int $id
 * @property int $from_id
 * @property int $to_id
 * @property double $amount
 * @property int $user_id
 *
 * @property Accounts $from
 * @property Accounts $to
 * @property User $user
 */
class AccountTransaction extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'account_transaction';
    }

    public function behaviors()
    {
        return [

            AccountTransferBehavior::className(),

        ];
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['from_id', 'to_id', 'user_id'], 'integer'],
            [['from_id', 'to_id'], 'required'],
            ['from_id', 'compare', 'compareAttribute' => 'to_id', 'operator' => '!='],
            [['amount'], 'safe'],
            [['from_id'], 'exist', 'skipOnError' => true, 'targetClass' => Accounts::className(), 'targetAttribute' => ['from_id' => 'id']],
            [['to_id'], 'exist', 'skipOnError' => true, 'targetClass' => Accounts::className(), 'targetAttribute' => ['to_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'from_id' => 'From ID',
            'to_id' => 'To ID',
            'amount' => 'Amount',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFrom()
    {
        return $this->hasOne(Accounts::className(), ['id' => 'from_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTo()
    {
        return $this->hasOne(Accounts::className(), ['id' => 'to_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
