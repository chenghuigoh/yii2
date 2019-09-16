<?php

/* @var $this yii\web\View */

use yii\widgets\GridView;


$this->title = 'My Movie';

?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Movie List</h1>

    </div>

    <div class="body-content">


        <?php

        use yii\widgets\ListView;

        // echo ListView::widget([
        //     'dataProvider' => $dataProvider,
        //     'itemView' => 'movielist',
        // ]);
        ?>
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