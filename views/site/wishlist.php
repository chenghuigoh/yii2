<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

?>

<div class="container">
    <h2>Your wishlist</h2>
</div>



<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'movie_name',
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
        [
            'attribute' => 'id',
            'format' => 'html',
            'value' => function ($data) {
                return Html::a(
                    '<span class=" glyphicon glyphicon-remove"></span>',
                    Yii::$app->homeUrl . 'site/deletewishlist' . '?id=' . $data['id'],
                    [
                        'title' => 'Remove',
                        'data-pjax' => 'id',
                    ]
                );
            },
        ],
        // [
        //     'attribute' => 'id',
        //     'class' => 'yii\grid\ActionColumn',
        //     'template' => '{deletewishlist} ',
        //     'buttons' => [
        //         'deletewishlist' => function ($url, $model) use ($id) {
        //             return Html::a(
        //                 '<span class=" glyphicon glyphicon-remove"></span>',
        //                 $url .= '&uid=' . $id,
        //                 [
        //                     'title' => 'Remove',
        //                     'data-pjax' => 'id',
        //                 ]
        //             );
        //         },
        //     ],
        // ],


    ],
]); ?>