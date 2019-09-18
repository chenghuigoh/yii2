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
                    <button class="btn btn-info" style="width:100%" onclick="addWishList(<?= $model->id ?>)">Add To Wishlist</button>
                <?php
                } ?>

            </div>

            <div class="tab-pane fade" id="timeline">
                <h5> <b>
                        Showtime:
                    </b>
                    <?= $model->timeline ?>
                </h5>
            </div>
        </div>
    </div>
</div>

<?php if (Yii::$app->session->hasFlash('success')) : ?>
    <div class="alert alert-success alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <h4><i class="icon fa fa-check"></i>Saved!</h4>
        <?= Yii::$app->session->getFlash('success') ?>
    </div>
<?php endif; ?>


<?php if (Yii::$app->session->hasFlash('error')) : ?>
    <div class="alert alert-danger alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <h4><i class="icon fa fa-check"></i>Saved!</h4>
        <?= Yii::$app->session->getFlash('error') ?>
    </div>
<?php endif; ?>
<!-- <?php

        use yii\bootstrap\Alert;

        echo Alert::widget([
            'options' => ['class' => 'alert-info'],
            'body' => Yii::$app->session->getFlash('wishlist'),
        ]);
        ?> -->
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