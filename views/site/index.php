<?php

use yii\widgets\ListView;

/* @var $this yii\web\View */

$this->title = 'My Movie';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Movie List</h1>
    </div>

    <div class="body-content">

        <div class="row">
            <?php
            echo ListView::widget([
                'dataProvider' => $dataProvider,
                'itemView' => 'movielist',
            ]);
            ?>
        </div>

    </div>
</div>