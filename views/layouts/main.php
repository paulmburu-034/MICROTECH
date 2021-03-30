<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-light navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'Admin',  'items' => [
                    ['label' => 'New Auth Item', 'url' => '/auth-item/create', 'visible'=>Yii::$app->user->can('create-auth-item')],
                    ['label' => 'View Auth Items', 'url' => '/auth-item', 'visible'=>Yii::$app->user->can('auth-item-index')],
                    ['label' => 'New Auth Item Child', 'url' => '/auth-item-child/create', 'visible'=>Yii::$app->user->can('create-auth-item-child')],
                    ['label' => 'View Auth Items Child', 'url' => '/auth-item-child', 'visible'=>Yii::$app->user->can('auth-item-child')],
                    ['label' => 'Auth Item Assignment', 'url' => '/auth-assignment/create', 'visible'=>Yii::$app->user->can('create-auth-assignment')],
                    ['label' => 'Users Assigned', 'url' => '/auth-assignment', 'visible'=>Yii::$app->user->can('auth-assignment')],
        ], 'visible'=>Yii::$app->user->can('create-auth-item')],
        ['label' => 'Birth Registration',  'items' => [
                    ['label' => 'New Birth Registration', 'url' => '/birth-details/create', 'visible'=>Yii::$app->user->can('create-birth')],
                    ['label' => 'View Birth Registration', 'url' => '/birth-details', 'visible'=>Yii::$app->user->can('view-birth-index')],
        ], 'visible'=>Yii::$app->user->can('view-birth-index')],
        ['label' => 'Death Registration',  'items' => [
                    ['label' => 'New Death Registration', 'url' => '/death-details/create', 'visible'=>Yii::$app->user->can('create-death')],
                    ['label' => 'View Death Registration', 'url' => '/death-details', 'visible'=>Yii::$app->user->can('death-details-index')],
        ], 'visible'=>Yii::$app->user->can('death-details-index')],
        ['label' => 'Certificates',  'items' => [
                    ['label' => 'Birth Certificates', 'url' => '/certificates/search-birth', 'visible'=>Yii::$app->user->can('search-birth')],
                    ['label' => 'Death Certificates', 'url' => '/certificates/search-death', 'visible'=>Yii::$app->user->can('search-death')],
        ], 'visible'=>Yii::$app->user->can('certificate-index')],
        ['label' => 'Location',  'items' => [
                    ['label' => 'New County', 'url' => '/county/create', 'visible'=>Yii::$app->user->can('create-county')],
                    ['label' => 'New Constituency', 'url' => '/constituency/create', 'visible'=>Yii::$app->user->can('create-constituency')],
                    ['label' => 'View Counties', 'url' => '/county', 'visible'=>Yii::$app->user->can('view-county')],
                    ['label' => 'View Constituencies', 'url' => '/constituency', 'visible'=>Yii::$app->user->can('view-constituency')],
        ], 'visible'=>Yii::$app->user->can('county-index')],
        ['label' => 'Centre',  'items' => [
                    ['label' => 'New Registration Centre', 'url' => '/registration-center/create', 'visible'=>Yii::$app->user->can('create-center')],
                    ['label' => 'View Registration Centre', 'url' => '/registration-center', 'visible'=>Yii::$app->user->can('index-center')],
        ], 'visible'=>Yii::$app->user->can('center-index')],
        ['label' => 'Analytics',  'items' => [
                    ['label' => 'Birth Analysis', 'url' => '/analysis/birth-analysis', 'visible'=>Yii::$app->user->can('birth-analys')],
                    ['label' => 'Death Analysis', 'url' => '/analysis/death-analysis', 'visible'=>Yii::$app->user->can('death-analys')],
        ], 'visible'=>Yii::$app->user->can('analysis-index')],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer navbar-fixed-bottom" style="background-color: #000080;">
    <div class="container" style="color: white;">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> 2020 - <?= date('Y') ?></p>

        <p class="pull-right">Powered By : E-Tech Enterprise Solutions</p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>