<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;



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
        'class' => 'navbar-inverse',
    ],
]);

$menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'Birth Registration',  'items' => [
                    ['label' => 'New Births', 'url' => '/birth-details/create'],
                    ['label' => 'View Registration', 'url' => '/birth-details'],
        ]],
        ['label' => 'Death Registration',  'items' => [
                    ['label' => 'New Deaths', 'url' => '/death-details/create'],
                    ['label' => 'View Registration', 'url' => '/death-details'],
        ]],
        ['label' => 'Location Registration',  'items' => [
                    ['label' => 'County', 'url' => '/county/create'],
                    ['label' => 'Constituency', 'url' => '/constituency/create'],
        ]],
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

if( count($menuItems) ){
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => $menuItems,
    ]);
}
?>
<form class="navbar-form navbar-left" action="/action_page.php">
    <div class="form-group has-feedback search">
        <input type="text" class="form-control" placeholder="Search" />
        <i class="glyphicon glyphicon-search form-control-feedback"></i>
    </div>
</form>
<?php
NavBar::end();?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
