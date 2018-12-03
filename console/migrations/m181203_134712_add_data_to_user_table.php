<?php

use yii\db\Migration;

/**
 * Class m181203_134712_add_data_to_user_table
 */
class m181203_134712_add_data_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('{{%user}}', ['username', 'family_id', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at'], [
                ['admin1', 1, Yii::$app->security->generateRandomString(), Yii::$app->security->generateRandomString(), Yii::$app->security->generateRandomString(4) . '@mail.ru', time(), time()],
                ['user11', 1, Yii::$app->security->generateRandomString(), Yii::$app->security->generateRandomString(), Yii::$app->security->generateRandomString(4) . '@mail.ru', time(), time()],
                ['user22', 1, Yii::$app->security->generateRandomString(), Yii::$app->security->generateRandomString(), Yii::$app->security->generateRandomString(4) . '@mail.ru', time(), time()],
                ['user33', 1, Yii::$app->security->generateRandomString(), Yii::$app->security->generateRandomString(), Yii::$app->security->generateRandomString(4) . '@mail.ru', time(), time()],
                ['user44', 2, Yii::$app->security->generateRandomString(), Yii::$app->security->generateRandomString(), Yii::$app->security->generateRandomString(4) . '@mail.ru', time(), time()],
                ['user55', 2, Yii::$app->security->generateRandomString(), Yii::$app->security->generateRandomString(), Yii::$app->security->generateRandomString(4) . '@mail.ru', time(), time()],
                ['user66', 2, Yii::$app->security->generateRandomString(), Yii::$app->security->generateRandomString(), Yii::$app->security->generateRandomString(4) . '@mail.ru', time(), time()],

            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181203_134712_add_data_to_user_table cannot be reverted.\n";

        return false;
    }

}
