<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\People */
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
                    <img class="user-img" src="<?php echo Yii::$app->homeUrl . '../uploads/people/' . $model->image; ?> " />
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

                <div class="people-form">

                    <?php $form = ActiveForm::begin(); ?>

                    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'phone')->textInput() ?>

                    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'image1')->fileInput()->label('Upload Image') ?>

                    <div class="form-group">
                        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>

                </div>

                </div>
            </div>
    </div>