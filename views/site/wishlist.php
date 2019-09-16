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
    ],
    // 'rowOptions' => function ($model, $key, $index, $grid) {
    //     return ['id' => $model['id'], 'onclick' => 'v(this.id);'];
    // },
    'rowOptions'   => function ($model, $key, $index, $grid) {
        return ['data-id' => $model['movie_id']];
    },

]); ?>


<?php
$this->registerJs("

    $('td').click(function (e) {
        var id = $(this).closest('tr').data('id');
        if(e.target == this)
            location.href = '" . Url::to(['site/moviedetail']) . "?id=' + id;
    });

");
?>