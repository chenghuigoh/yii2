<?php

use yii\helpers\Html;
use yii\helpers\Url;


?>
<div class="col-lg-4">
    <div class="card">
        <img src="<?php echo Yii::$app->homeUrl . '../uploads/movie/' . $model->image; ?>" alt="Avatar" style="width: 100%">
        <div class="container">
            <h4><b> <?= Html::encode($model->name) ?>
                </b></h4>
            <p> <?= $model->id ?>
            </p>
        </div>
        <?php
        if (Yii::$app->user->can('addWishlist')) {
            ?>
            <button class="btn btn-default" style="width:100%" onclick="addWishList(<?= $model->id ?>)">Add To Wishlist</button>
        <?php

        } ?>
    </div>
</div>

<script>
    function addWishList(id) {
        $.ajax({
            url: '<?php echo Yii::$app->homeUrl . 'site/addwishlist'  ?>',
            type: 'get',
            data: {
                'id': id
            },
            success: function(data) {}
        });
    }
</script>