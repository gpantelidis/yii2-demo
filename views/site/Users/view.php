<?php


use yii\bootstrap5\Html;
use app\models\Usergroups;


$this->title = 'View User : ' . $user->name;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-view-user">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <ul class="list-group">
                <li class="list-group-item">ID: </span> <?= $user->id ?></li>
                <li class="list-group-item">Name: </span> <?= $user->name ?></li>
                <li class="list-group-item">Email: </span> <?= Html::a($user->email, 'mailto:' . $user->email, ['class' => '']); ?></li>
                <li class="list-group-item">Mobile: </span> <?= Html::a($user->mobile, 'tel:' . $user->mobile, ['class' => '']); ?></li>
                <li class="list-group-item">Usergroup: </span> <?= Usergroups::findOne($user->usergroups_id)->name ?></li>
                <li class="list-group-item">Create date: </span> <?= $user->create_dt ?></li>
                <li class="list-group-item">Last Update: </span> <?= $user->update_dt ?></li>
                <li class="list-group-item">Active: </span>
                    <input type="checkbox" aria-label="Checkbox for following text input" disabled <?php if (!$user->inactive) : ?> checked <?php endif; ?>>
                </li>
        </div>
        </ul>
    </div>
    <div class="col-lg-12">
        <div class="col-lg-3 mt-3">
            <?= Html::a('Go Back', '/users',['class' => 'btn btn-primary']); ?>
        </div>
    </div>
</div>
</div>