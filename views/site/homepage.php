<?php

/** @var yii\web\View $this */

$this->title = 'G.Pantelidis Project';
$this->registerCssFile(Yii::$app->request->baseUrl . '/css/homepage.css', [
    'rel' => 'stylesheet',
], 'css-datatable');

?>
<div class="site-index">


    <div class="row gx-0">
        <div class="col-lg-6">
            <a class="portfolio-item" href="/users">
                <div class="caption">
                    <div class="caption-content">
                        <div class="h2">Users</div>
                    </div>
                </div>
                <img class="img-fluid" src="/img/users.jpg" alt="...">
            </a>
        </div>
        <div class="col-lg-6">
            <a class="portfolio-item" href="/leassons">
                <div class="caption">
                    <div class="caption-content">
                        <div class="h2">Leassons</div>
                    </div>
                </div>
                <img class="img-fluid" src="/img/lessons.jpg" alt="...">
            </a>
        </div>
        <div class="col-lg-6">
            <a class="portfolio-item" href="/usergroups">
                <div class="caption">
                    <div class="caption-content">
                        <div class="h2">Usergroups</div>
                    </div>
                </div>
                <img class="img-fluid" src="/img/usergroups.jpg" alt="...">
            </a>
        </div>
        <div class="col-lg-6">
            <a class="portfolio-item" href="/students">
                <div class="caption">
                    <div class="caption-content">
                        <div class="h2">Students</div>
                    </div>
                </div>
                <img class="img-fluid" src="/img/students.jpg" alt="...">
            </a>
        </div>
        <div class="col-lg-6">
            <a class="portfolio-item" href="/teachers">
                <div class="caption">
                    <div class="caption-content">
                        <div class="h2">Teachers</div>
                    </div>
                </div>
                <img class="img-fluid" src="/img/teachers.jpg" alt="...">
            </a>
        </div>
        <div class="col-lg-6">
            <a class="portfolio-item" href="/import">
                <div class="caption">
                    <div class="caption-content">
                        <div class="h2">Import Data</div>
                    </div>
                </div>
                <img class="img-fluid" src="/img/import.jpg" alt="...">
            </a>
        </div>
    </div>
</div>