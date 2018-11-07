<?php

namespace common\models;

use frontend\components\behaviors\TransactionsCalculateBehavior;
use frontend\components\behaviors\TransactionsInfoBehavior;
use frontend\components\behaviors\TransactionsTimeBehavior;
use Yii;

/**
 * This is the model class for table "transactions".
 *
 * @property int $id
 * @property int $user_id
 * @property double $amount
 * @property int $category_id
 * @property int $account_id
 * @property int $profile_id
 * @property string $created_at
 * @property string $date
 * @property int $family_id
 *
 * @property Accounts $account
 * @property Category $category
 * @property Family $family
 * @property Profile $profile
 * @property User $user
 */
class Transactions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transactions';
    }


    public function behaviors()
    {
        return [
            TransactionsInfoBehavior::className(),
            TransactionsCalculateBehavior::className(),
            TransactionsTimeBehavior::className(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['account_id', 'category_id'], 'required'],
            [['user_id', 'category_id', 'account_id', 'profile_id', 'family_id'], 'integer'],
            [['amount'], 'number'],
            [['created_at', 'date'], 'safe'],
            [['account_id'], 'exist', 'skipOnError' => true, 'targetClass' => Accounts::className(), 'targetAttribute' => ['account_id' => 'id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['family_id'], 'exist', 'skipOnError' => true, 'targetClass' => Family::className(), 'targetAttribute' => ['family_id' => 'id']],
            [['profile_id'], 'exist', 'skipOnError' => true, 'targetClass' => Profile::className(), 'targetAttribute' => ['profile_id' => 'id']],
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
            'amount' => 'Amount',
            'category_id' => 'Category ID',
            'account_id' => 'Account ID',
            'profile_id' => 'Profile ID',
            'created_at' => 'Created At',
            'date' => 'Date',
            'family_id' => 'Family ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccount()
    {
        return $this->hasOne(Accounts::className(), ['id' => 'account_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
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
    public function getProfile()
    {
        return $this->hasOne(Profile::className(), ['id' => 'profile_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
