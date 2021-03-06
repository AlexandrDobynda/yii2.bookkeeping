<?php

namespace common\models;

use frontend\components\behaviors\AccountBehavior;
use Yii;

/**
 * This is the model class for table "accounts".
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $currency
 * @property int $amount
 * @property int $family_id
 *
 * @property Family $family
 * @property User $user
 * @property Transactions[] $transactions
 */
class Accounts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'accounts';
    }

    public function behaviors()
    {
        return [

            AccountBehavior::className(),

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['amount', 'name'], 'required' ],
            [['amount'], 'safe'],
            [['user_id', 'family_id'], 'integer'],
            [['name', 'currency'], 'string'],
            [['family_id'], 'exist', 'skipOnError' => true, 'targetClass' => Family::className(), 'targetAttribute' => ['family_id' => 'id']],
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
            'user_id' => 'User ID',
            'name' => 'Name',
            'currency' => 'Currency',
            'amount' => 'Amount',
            'family_id' => 'Family ID',
        ];
    }

    /**
     * @return array
     */
    public static function getIdList(): array
    {
        return \yii\helpers\ArrayHelper::getColumn(static::find()->all(), 'id');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFamily()
    {
        return $this->hasOne(Family::className(), ['id' => 'family_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransactions()
    {
        return $this->hasMany(Transactions::className(), ['account_id' => 'id']);
    }

    public function getAccountTransaction()
    {
        return $this->hasMany(AccountTransaction::className(), ['from_id' => 'id', 'to_id' => 'id']);
    }

}
