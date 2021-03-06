<?php

namespace common\models;

use frontend\components\behaviors\InviteBehavior;
use frontend\components\behaviors\InviteSentBehavior;
use Yii;

/**
 * This is the model class for table "invites".
 *
 * @property int $id
 * @property int $family_id
 * @property string $secret_string
 * @property string $created_at
 * @property string $email
 *
 * @property Family $family
 */
class Invites extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'invites';
    }

    public function behaviors()
    {
        return [
            InviteBehavior::className(),
            InviteSentBehavior::className(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['family_id'], 'integer'],
            [['secret_string', 'created_at'], 'string'],
            [['email'], 'email'],
            [['family_id'], 'exist', 'skipOnError' => true, 'targetClass' => Family::className(), 'targetAttribute' => ['family_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'family_id' => 'Family ID',
            'secret_string' => 'Secret String',
            'created_at' => 'Created At',
            'email' => 'Email',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFamily()
    {
        return $this->hasOne(Family::className(), ['id' => 'family_id']);
    }
}
