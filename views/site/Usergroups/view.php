<?php


use yii\bootstrap5\Html;


$this->title = 'View Usergroup : ' . $usergroup->name;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-view-usergroup">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <ul class="list-group">
                <li class="list-group-item">ID: </span> <?= $usergroup->id ?></li>
                <li class="list-group-item">Name: </span> <?= $usergroup->name ?></li>
                <li class="list-group-item">Create date: </span> <?= $usergroup->create_dt ?></li>
                <li class="list-group-item">Last Update: </span> <?= $usergroup->update_dt ?></li>
                <li class="list-group-item">Active: </span>
                    <input type="checkbox" aria-label="Checkbox for following text input" disabled <?php if (!$usergroup->inactive) : ?> checked <?php endif; ?>>
                </li>
        </div>
        </ul>
    </div>
    <div class="col-lg-12">
        <div class="col-lg-3 mt-3">
            <?= Html::a('Go Back', '/usergroups',['class' => 'btn btn-primary']); ?>
        </div>
    </div>
</div>
</div>