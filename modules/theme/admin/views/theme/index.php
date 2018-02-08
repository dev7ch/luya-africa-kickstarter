<?php
use luya\admin\helpers\Angular;
?>

<h3 class="mb-4 mt-1">General Theme Settings</h3>
<div class="themeadmin" ng-controller="ThemeSettingsController">
    <? if (is_object($settings)): $modelId = $settings->id ?>
        <div class="alert alert-success p-3">
            <div class="row">
                <div class="col-md-4">
                    <img src="<?= Yii::$app->storage->getImage($settings->logo)->applyFilter('small-thumbnail')->source ?>" alt="jabula schnabula">
                </div>
                <div class="col-md-8">
                    <h3><?= $settings->site_name ?></h3>
                    <span class="email"><?= $settings->company_email ?></span>
                </div>
            </div>
        </div>
    <? else: ?>
    <div class="alert alert-warning p-3">
        <span>Whoops, no logo, title or email found.</span>
    </div>

    <? endif; ?>
    <h3 class="my-4">Change Theme Settings</h3>
    <form class="form">
        <?= Angular::imageUpload('data.logo', 'Logo'); ?>
        <?= Angular::text('data.site_name', 'Site name')?>
        <?= Angular::text('data.company_email', 'Email', ['placeholder' => 'General email address of this website']); ?>
        <p class="my-3 font-weight-bold">Social Channel Media Links</p>
        <?= Angular::text('data.facebook', 'Facebook')?>
        <?= Angular::text('data.youtube', 'Youtube')?>
        <?= Angular::text('data.insta', 'Instagramm')?>
        <div class="alert alert-info p-3">
            <div class="row">
                <div class="col-sm-12">
                    <h5>Site name: {{ data.site_name }}</h5>
                    <span>Email: {{ data.company_email }}</span>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-icon btn-save mb-4" ng-click="submitInput(<?= $settings ? $modelId : false ?>)"> Speichern</button>
    </form>

</div>

<!-- inline AngularJS for luya admin -->

<script>
    zaa.bootstrap.register('ThemeSettingsController', function($scope, $controller, $http, $window) {
        $scope.data = {};
        $scope.submitInput = function($id)
        {
            console.log($scope.data.id);
            if ($id > 0) {
                $http.put('admin/api-theme-settings/update?id=' + $id, $scope.data).then(function(response) {
                    $window.location.reload();
                });
            }
            else {
                $http.post('admin/api-theme-settings', $scope.data).then(function (reponse) {
                    $window.location.reload();
                });
            }
        };
    });
</script>
