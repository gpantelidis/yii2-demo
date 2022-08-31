<?php


use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use app\models\Usergroups;

$this->title = 'Create new User';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-create-user">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="form-group">
            <div class="col-lg-6">
                <?= $form->field($user, 'name')->textInput(['autofocus' => true]) ?>
            </div>
            <div class="col-lg-6">
                <?php $items = Usergroups::find()
                    ->select(['name'])
                    ->indexBy('id')
                    ->where(['inactive'=>0])
                    ->column(); ?>
                <?= $form->field($user, 'usergroups_id')->dropDownList($items, ['prompt' => 'Select'])->label('User group')?>
            </div>
            <div class="col-lg-6">
                <?= $form->field($user, 'email')->textInput(['autofocus' => true]) ?>
            </div>
            <div class="col-lg-6">
                <?= $form->field($user, 'mobile')->textInput(['autofocus' => true]) ?>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <?= Html::submitButton($this->title, ['class' => 'btn btn-primary']); ?>
                </div>
                <div class="col-lg-3">
                    <?= Html::a('Go Back', 'users', ['class' => 'btn btn-primary']); ?>
                </div>
            </div>
        </div>
    </div>
</div>


<?php ActiveForm::end(); ?>
</div>