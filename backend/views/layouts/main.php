<?php

use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */




if (Yii::$app->controller->action->id === 'login') {
    echo $this->render(
        'main-login',
        ['content' => $content]
    );
} else {

    if(Yii::$app->user->isGuest) {
        return Yii::$app->response->redirect(['/user/login']);
    }

    if (class_exists('backend\assets\AppAsset')) {
        backend\assets\AppAsset::register($this);
    }
    dmstr\web\AdminLteAsset::register($this);

    $directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
?>
    <?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">

    <head>
        <meta charset="<?= Yii::$app->charset ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>

    <body class="hold-transition skin-blue sidebar-mini">
        <?php $this->beginBody() ?>
        <div class="wrapper">

            <?= $this->render(
                'header.php',
                ['directoryAsset' => $directoryAsset]
            ) ?>

            <?php 
                if (Yii::$app->user->can('admin')) {
                     echo $this->render(
                        'sidebar.php',
                        ['directoryAsset' => $directoryAsset]
                     );
                }
     
            ?>

            <?= $this->render(
                'content.php',
                ['content' => $content, 'directoryAsset' => $directoryAsset]
            ) ?>

        </div>

        <?php $this->endBody() ?>
    </body>

    </html>
    <?php $this->endPage() ?>
<?php } ?>