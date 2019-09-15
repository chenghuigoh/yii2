<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>
<div class="col-lg-4">

    <div class="card">
        <a href=" <?php
                    echo Url::to(['site/moviedetail/?id=' . $model->id]);
                    ?>">
            <img src="<?php echo Yii::$app->homeUrl . '../uploads/movie/' . $model->image; ?>" alt="Avatar" style="width: 100%">
            <div class="container">
                <h4><b> <?= Html::encode($model->name) ?>
                    </b></h4>
                <p> <?= $model->id ?>
                </p>



            </div>
        </a>
    </div>
</div>