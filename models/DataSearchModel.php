<?php


namespace app\models;


class DataSearchModel extends \app\models\dataModel
{
    public $year;
    public $month;

    public function searchByYear($year = null){
        $_year = $year ?? $this->year;
        return self::find()->where('year(date) = \''.$_year.'\'');
    }

    public function searchByMonth($month = null){
        $_month = $month ?? $this->month;
        return self::find()->where('month(date) = \''.$_month.'\'');
    }

    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
            'year' => 'Год',
            'month' => 'Месяц'
        ]);
    }

    public static function findBy($data) {
        $model = new self;
        if (!is_null($data['year']) && $data['year'] !== '') {
            $model->year = $data['year'];
            return $model->searchByYear();
        }
        if (!is_null($data['month']) && $data['month'] !== '') {
            $model->month = $data['month'];
            return $model->searchByMonth();
        }
        if (!is_null($data['card_number']) && $data['card_number'] !== '') {
            return $model::find()->where(['card_number' => $data['card_number']]);
        }
    }
}