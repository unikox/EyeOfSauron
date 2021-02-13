<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserRequestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Requests';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-request-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create User Request', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'applicant',
            'created_at',
            'updated_at',
            'cloused_at',
            //'cat_request',
            //'body:ntext',
            //'status',
            //'quality_mark',
            //'tel',
            //'email:email',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
