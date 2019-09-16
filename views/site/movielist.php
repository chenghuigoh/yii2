<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>
<div class="col-12 col-xs-12 col-sm-6 col-md-4 col-lg-3  m-5 equal">

    <div class="card">
        <a href=" <?php
                    echo Url::to(['site/moviedetail/?id=' . $model->id]);
                    ?>">
            <img class="m-img" src="<?php echo Yii::$app->homeUrl . '../uploads/movie/' . $model->image; ?>" alt="Movie">
            <div>
                <h4><b> <?= Html::encode($model->name) ?>
                    </b></h4>
                <p> <?php echo date("d-M-Y",  strtotime($model->released_date)); ?>
                </p>



            </div>
        </a>
    </div>
</div>