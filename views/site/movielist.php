<?php

use yii\helpers\Html;
use yii\helpers\Url;
?>


<div class="col-lg-4">
    <div class="card">
        <a href="<?php
                    echo Url::to(['site/moviedetail/?id=' . $model->id]);
                    ?>">
            <img class="movie-img" src="<?php echo Yii::$app->homeUrl . '../uploads/movie/' . $model->image; ?>">
            <div class="container">
                <?= Html::encode($model->name) ?>
                <br>
                <p>
                    <?php

                    echo  date("d-M-Y",  strtotime($model->released_date));

                    ?>
                </p>
            </div>
    </div>
</div>