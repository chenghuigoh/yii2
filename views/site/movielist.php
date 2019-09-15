<?php

use yii\helpers\Html;

?>


<div class="col-lg-4">
    <a class="card">
        <img class="movie-img" src="<?php echo Yii::$app->homeUrl . '../uploads/movie/' . $model->image; ?> " />
        <div class="container">
            <?= Html::encode($model->name) ?>
            <br>
            <p>
                <?php

                echo  date("d-M-Y",  strtotime($model->released_date));

                ?>
            </p>
    </a>
</div>
</div>