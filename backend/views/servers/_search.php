<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ServersSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="servers-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id'); ?>

    <?= $form->field($model, 'name'); ?>

    <?= $form->field($model, 'ip'); ?>

    <?= $form->field($model, 'os'); ?>

    <?= $form->field($model, 'location'); ?>

    <?php // echo $form->field($model, 'services')?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']); ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
