<?php

/* @var $this yii\web\View */

use app\components\DataSummaryWidget;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;


$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="row">
        <div class="col-md-2">
            <?= DataSummaryWidget::widget(['data' => $dataSummary]) ?>
        </div>
        <div class="col-md-10">
            <div class="body-content">
                <div class="row">

                   <?= $this->renderFile(__DIR__.'/_search.php',['model'=> new app\models\DataSearchModel()])?>
                </div>
                <div class="row">
                <?php
                $dataProvider = new ActiveDataProvider([
                    'query' => $data,
                    'pagination' => [
                        'pageSize' => 20,
                    ],
                ]);
//                var_dump($data);
                echo GridView::widget([
                    'dataProvider' => $dataProvider,
                ]);
                ?>
                </div>
            </div>
        </div>
    </div>
</div>
