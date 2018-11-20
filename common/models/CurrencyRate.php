<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "currency_rate".
 *
 * @property int $id
 * @property string $name
 * @property string $char_code
 * @property double $value
 * @property int $updated_at
 */
class CurrencyRate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'currency_rate';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'char_code'], 'string'],
            [['value'], 'safe'],
            [['updated_at'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'char_code' => 'Char Code',
            'value' => 'Value',
            'updated_at' => 'Updated at',
        ];
    }

    public function isNeedUpdate()
    {
        if ($savedRub = self::findOne(['char_code' => 'RUB'])) {

            return isset($savedRub->updated_at) ? (time() - $savedRub->updated_at) > 1 : true;

        } else {

            return true;
        }
    }

    public function updateDb()
    {
        $newRates = Yii::$app->CbRF->all();
        $newRates[] = [
            'name' => 'Российский рубль',
            'value' => 1,
            'char_code' => 'RUB',
            'num_code' => 1,
        ];

        foreach ($newRates as $currency) {
            if (!$db = self::findOne(['char_code' => $currency['char_code']])) {

                $db = new self;
                $db->name = $currency['name'];
                $db->char_code = $currency['char_code'];
                $db->value = $currency['value'];
                $db->updated_at = time();
                $db->save();

            } else {

                $db->value = $currency['value'];
                $db->updated_at = time();
                $db->save();
            }
        }
    }

    public function getSavedRates()
    {
        if (self::isNeedUpdate()) {
            self::updateDb();
        }

        return self::find()->asArray()->all();
    }

    /**
     * @return array
     */
    public function getSavedShort()
    {
        return ArrayHelper::map(self::getSavedRates(), 'char_code', 'value');
    }
}
