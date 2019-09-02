<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

?>

<?php
$form = ActiveForm::begin([
        'id' => 'filter-form',
    'layout' => 'horizontal',
    'action' => Url::to(['/site/index'])
]);
?>
<?= $form->field($model, 'card_number') ?>
<?= $form->field($model, 'month') ?>
<?= $form->field($model, 'year') ?>

<div class="form-group">
    <?= Html::submitButton('Search') ?>
</div>

<?php ActiveForm::end(); ?>
