<?php


use yii\bootstrap5\Html;
use app\models\Users;

$this->title = 'View Lesson : ' . $lesson->name;
$this->params['breadcrumbs'][] = $this->title;

$teacher = Users::findOne($lesson->users_id);
?>
<div class="site-view-lesson">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <ul class="list-group">
                <li class="list-group-item">ID: </span> <?= $lesson->id ?></li>
                <li class="list-group-item">Name: </span> <?= $lesson->name ?></li>
                <li class="list-group-item">Teacher: </span> <?= Html::a($teacher->name, '/usersview?id=' . $teacher->id, ['class' => 'btn btn-secondary btn-sm']); ?></li>
                <li class="list-group-item">Description: </span> <?= $lesson->description ?></li>
                <li class="list-group-item">Create date: </span> <?= $lesson->create_dt ?></li>
                <li class="list-group-item">Last Update: </span> <?= $lesson->update_dt ?></li>
                <li class="list-group-item">Active: </span>
                    <input type="checkbox" aria-label="Checkbox for following text input" disabled <?php if (!$lesson->inactive) : ?> checked <?php endif; ?>>
                </li>
        </div>
        </ul>
    </div>
    <div class="col-lg-12">
        <div class="col-lg-3 mt-3">
            <?= Html::a('Go Back', '/lessons', ['class' => 'btn btn-primary']); ?>
        </div>
    </div>
</div>
</div>