<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserRequestSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-request-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'applicant') ?>

    <?= $form->field($model, 'created_at') ?>

    <?= $form->field($model, 'updated_at') ?>

    <?= $form->field($model, 'cloused_at') ?>

    <?php // echo $form->field($model, 'cat_request') ?>

    <?php // echo $form->field($model, 'body') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'quality_mark') ?>

    <?php // echo $form->field($model, 'tel') ?>

    <?php // echo $form->field($model, 'email') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
