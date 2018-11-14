<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "profile".
 *
 * @property int $id
 * @property int $user_id
 * @property string $first_name
 * @property string $last_name
 *
 * @property User $user
 * @property Transactions[] $transactions
 */
class Profile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profile';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'family_id'], 'integer'],
            [['first_name', 'last_name'], 'string'],
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
            'family_id' => 'Family ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
        ];
    }

    public static function getId()
    {
        if (!static::findOne(['user_id' => Yii::$app->user->getId()])) {
            return null;
        }

        $profile = static::findOne(['user_id' => Yii::$app->user->getId()]);
        return $profile->id;
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
        return $this->hasMany(Transactions::className(), ['profile_id' => 'id']);
    }

    public function getFamily()
    {
        return $this->hasOne(Family::className(), ['id' => 'family_id']);
    }
}
