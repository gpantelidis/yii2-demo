<?php


use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Create new Usergroup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-create-usergroup">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="form-group">
            <div class="col-lg-6">
                <?= $form->field($usergroup, 'name')->textInput(['autofocus' => true]) ?>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <?= Html::submitButton($this->title, ['class' => 'btn btn-primary']); ?>
                </div>
                <div class="col-lg-3">
                    <?= Html::a('Go Back', 'usergroups', ['class' => 'btn btn-primary']); ?>
                </div>
            </div>
        </div>
    </div>
</div>


<?php ActiveForm::end(); ?>
</div>