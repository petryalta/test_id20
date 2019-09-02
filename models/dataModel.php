<?php

namespace app\models;

use Yii;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use yii\db\Query;
use yii\db\QueryBuilder;

/**
 * This is the model class for table "id20.data".
 *
 * @property int $id
 * @property string $card_number
 * @property string $date
 * @property double $volume
 * @property string $service
 * @property int $address_id
 */
class dataModel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'id20.data';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'volume', 'service'], 'required'],
            [['date'], 'safe'],
            [['volume'], 'number'],
            [['address_id'], 'integer'],
            [['card_number'], 'string', 'max' => 20],
            [['service'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'card_number' => 'Номер карты',
            'date' => 'Дата',
            'volume' => 'Объем',
            'service' => 'Услуга',
            'address_id' => 'Address ID',
        ];
    }

    public static function getTransactionCount(array $filter = []) {
        $query = (new Query())->select(['year' => 'YEAR(date)','month' => 'MONTH(date)','counts' => 'count(*)'])
            ->from(self::tableName())
            ->where($filter)
            ->groupBy('YEAR(date),MONTH(date) with ROLLUP')
            ->all();
        return $query;
    }
}
