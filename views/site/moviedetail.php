<?php

use yii\helpers\Html;
use yii\helpers\Url;


?>
<div class="row">

    <div class="col-lg-4">
        <div class="card">
            <img class="movie-img" src="<?php echo Yii::$app->homeUrl . '../uploads/movie/' . $model->image; ?> " />
            <div class="container">
                <h2><b><?= Html::encode($model->name) ?></b></h2>
                <br>
            </div>
        </div>
    </div>
    <div class="col-lg-8">

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li class="active">
                <a href="#details" role="tab" data-toggle="tab"> Details
                </a>
            </li>
            <li><a href="#timeline" role="tab" data-toggle="tab">
                    Timeline
                </a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane fade active in" id="details">
                <h5> <b>
                        Release Date:
                    </b>
                    <?php
                    echo  date("d-M-Y",  strtotime($model->released_date));
                    ?>
                    <hr>
                    <br>
                    <b>
                        Description:
                    </b>
                    <?= $model->descrip ?>
                </h5>
                <?php
                if (Yii::$app->user->can('addWishlist')) {
                    ?>
                    <button class="btn btn-default" style="width:100%" onclick="addWishList(<?= $model->id ?>)">Add To Wishlist</button>
                <?php
                } ?>

            </div>

            <div class="tab-pane fade active in" id="timeline">

            </div>
        </div>
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