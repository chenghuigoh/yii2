<?php

use Symfony\Component\DomCrawler\Image;
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;


?>
<div class="user">
    <?= $model->id ?>
    <?= Html::encode($model->name) ?>

    <img class="movie-img" src="<?php echo Yii::$app->homeUrl . '../uploads/movie/' . $model->image; ?> " />

</div>