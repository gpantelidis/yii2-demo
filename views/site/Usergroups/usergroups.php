<?php

/** @var yii\web\View $this */

use yii\web\View;
use yii\helpers\Html;

$this->title = 'Usergroups';
$this->params['breadcrumbs'][] = $this->title;

$this->registerJsFile(Yii::$app->request->baseUrl . '/js/jquery.dataTables.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile(Yii::$app->request->baseUrl . '/js/dataTables.bootstrap4.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerCssFile(Yii::$app->request->baseUrl . '/css/dataTables.bootstrap4.min.css', [
    'rel' => 'stylesheet',
], 'css-datatable');

$this->registerJs(
    "$('#dataTable').DataTable({});",
    View::POS_READY,
    'datatable'
);

?>
<div class="site-usergroups">
    <?php if (yii::$app->session->getFlash('message')) : ?>
        <div class="alert alert-dismissible alert-success">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <?= yii::$app->session->getFlash('message') ?>
        </div>
    <?php endif; ?>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">Usergroups Table</h1>
                <!-- DataTales -->
                <?= Html::a('Create new', ['usergroupscreate'], ['class' => 'btn btn-primary mb-2']) ?>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary"><?= $this->title ?></h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive p-lg-4">
                            <table class="table table-bordered row-border" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Created Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Created Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php if (is_array($usergroups) && count($usergroups) > 0) : ?>
                                        <?php foreach ($usergroups as $usergroup) : ?>
                                            <tr>
                                                <td><?php if ($usergroup->inactive) : ?>
                                                        <i class="bi bi-x-lg"></i>
                                                    <?php endif ?>
                                                    <?= $usergroup->id ?>
                                                </td>
                                                <td><?= $usergroup->name ?></td>
                                                <td><?= $usergroup->create_dt ?></td>
                                                <td>
                                                    <span><?= Html::a('View', ['usergroupsview', 'id' => $usergroup->id], ['class' => 'btn btn-primary']) ?></span>
                                                    <span><?= Html::a('Edit', ['usergroupsedit', 'id' => $usergroup->id], ['class' => 'btn btn-secondary']) ?></span>
                                                    <span><?= Html::a('Delete', ['usergroupsdelete', 'id' => $usergroup->id], ['class' => 'btn btn-danger']) ?></span>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <tr>
                                            <td>
                                                <h2>No records Found!</h2>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->