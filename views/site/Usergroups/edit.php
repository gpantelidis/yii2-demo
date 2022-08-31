<?php


use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;


$this->title = 'Edit User: ' . $usergroup->name;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-edit-usergroup">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="form-group">
            <div class="col-lg-6">
                <?= $form->field($usergroup, 'name')->textInput(['autofocus' => true]) ?>
            </div>
            <div class="col-lg-6">
                <?= $form->field($usergroup, 'inactive')->checkbox(['uncheck' => 0])->label('Inactive') ?>
            </div>
            <div class="row">
                <div class="col-lg-2">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-primary']); ?>
                </div>
                <div class="col-lg-2">
                    <?= Html::a('Go Back', '/usergroups', ['class' => 'btn btn-primary']); ?>
                </div>
            </div>
        </div>
    </div>
</div>


<?php ActiveForm::end(); ?>
</div>