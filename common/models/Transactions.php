<?php

namespace common\models;

use frontend\components\behaviors\TransactionsCalculateBehavior;
use frontend\components\behaviors\TransactionsInfoBehavior;
use frontend\components\behaviors\TransactionsTimeBehavior;
use phpDocumentor\Reflection\Types\Integer;
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
            [['created_at', 'date', 'amount'], 'safe'],
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
     * @param int $minAmount
     * @param int $maxAmount
     * @param int $salary
     * @param int $transactionsCount
     * @return array
     */
    public static function prepareTransactionsArray(int $minAmount = 1, int $maxAmount = 5000, int $salary = 20000, int $transactionsCount = 4): array
    {
        $userIdList = array_reverse(User::getIdList());
        $result = [];

        foreach ($userIdList as $key => $id) {
            for ($i = 0; $i < rand(1, $transactionsCount); $i++) {

                foreach (static::makeTransaction($id, $key, $minAmount, $maxAmount) as $item) {
                    $result[] = $item;
                }
            }

            foreach (static::makeTransaction($id, $key, $minAmount, $maxAmount, $salary) as $item) {
                $result[] = $item;
                }
        }

        return $result;
    }

    /**
     * @param int $id
     * @param int $key
     * @param int $minAmount
     * @param int $maxAmount
     * @param int|null $salary
     * @param int $timeRange
     * @return array
     */
    private static function makeTransaction(int $id, int $key, int $minAmount, int $maxAmount, int $salary = null,int $timeRange = 604800):array
    {
        $familyId = User::findOne($id)->family_id;
        $accountIdList = array_reverse(Accounts::getIdList());
        $categoryIdList = array_reverse(Category::getIdList($familyId));
        $profileIdList = array_reverse(Profile::getIdList());

        return [
            $id,
            $salary ? $salary : -rand($minAmount, $maxAmount) ,
            $accountIdList[$key],
            $salary ? $categoryIdList[0] : $categoryIdList[rand(1, count($categoryIdList) - 1)],
            $profileIdList[$key],
            time(),
            time() + rand(-$timeRange, $timeRange),
            $familyId
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
