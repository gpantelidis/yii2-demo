<?php


use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use app\models\Users;

$this->title = 'Create new Lesson';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-create-lesson">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="form-group">
            <div class="col-lg-6">
                <?= $form->field($lesson, 'name')->textInput(['autofocus' => true]) ?>
            </div>
            <div class="col-lg-6">
                <?php $items = Users::find()
                    ->select(['name'])
                    ->indexBy('id')
                    ->where(['usergroups_id'=> 1])
                    ->column(); ?>
                <?= $form->field($lesson, 'users_id')->dropDownList($items, ['prompt' => 'Select'])->label('Teacher')?>
            </div>
            <div class="col-lg-6">
                <?= $form->field($lesson, 'description')->textarea(['autofocus' => true]) ?>
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