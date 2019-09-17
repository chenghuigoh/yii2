<?php

use yii\base\Model;
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Movie;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MovieSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Movies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="movie-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Movie', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'descrip:ntext',
            'released_date',
            'timeline',
            [
                'attribute' => 'image',
                'format' => 'html',
                'value' => function ($data) {
                    return Html::img(
                        Yii::$app->homeUrl . '../uploads/movie/' . $data['image'],
                        ['width' => '70px']
                    );
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>



</div>