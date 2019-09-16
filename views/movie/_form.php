<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Movie */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="container">
  <div class="row">

    <?php
    if ($model->image) {
      ?>
      <div class="col-lg-6">

        <?php
          if ($model->image) {
            ?>
          <img class="movie-img" src="<?php echo Yii::$app->homeUrl . '../uploads/movie/' . $model->image; ?> " />
        <?php

          }
          ?>
      </div>
    <?php

    }
    ?>

    <?php
    if ($model->image) {
      ?>
      <div class="col-lg-6">
      <?php
      }
      ?>

      <?php
      if (!$model->image) {
        ?>
        <div class="col-lg-12">
        <?php
        }
        ?>

        <div class="movie-form">

          <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

          <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

          <?= $form->field($model, 'descrip')->textarea(['rows' => 6]) ?>

          <?= $form->field($model, 'released_date')->Input('date') ?>

          <!-- <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?> -->

          <!-- <?php echo Html::img('@web/images/sp.jpg') ?> -->

          <?= $form->field($model, 'image1')->fileInput()->label('Upload Image') ?>



          <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
          </div>

          <?php ActiveForm::end(); ?>

        </div>
        </div>
      </div>
  </div>