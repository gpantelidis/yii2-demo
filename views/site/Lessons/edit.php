<?php


use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use app\models\Users;


$this->title = 'Edit Lesson: ' . $lesson->name;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-edit-lesson">
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
            <div class="col-lg-6">
                <?= $form->field($lesson, 'inactive')->checkbox(['uncheck' => 0])->label('Inactive') ?>
            </div>
            <div class="row">
                <div class="col-lg-2">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-primary']); ?>
                </div>
                <div class="col-lg-2">
                    <?= Html::a('Go Back', '/lessons', ['class' => 'btn btn-primary']); ?>
                </div>
            </div>
        </div>
    </div>
</div>


<?php ActiveForm::end(); ?>
</div>