<?php

use yii\helpers\Html;

?>


<div class="col-lg-4">
    <div class="card">
        <img class="movie-img" src="<?php echo Yii::$app->homeUrl . '../uploads/movie/' . $model->image; ?> " />
        <div class="container">
            Name: <?= Html::encode($model->name) ?>
            <br>
            <p>
                <?php

                Date_released: echo  date("d-M-Y",  strtotime($model->released_date));


                ?>
            </p>
        </div>
    </div>
</div>