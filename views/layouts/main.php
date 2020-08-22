<?php

/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;
use app\assets\AppAsset;
use yii\helpers\Url;

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

<section class="body">
    <header>
        <div class="container">
            <div class="header">
                <a href="/">На главную</a>
                <a href="#">Вход в админку</a>
                <a onclick="openCart(event)" href="#">Корзина</a>
                <form action="<?= Url::to(['/search']) ?>" method="get">
                    <input type="text" style="padding: 5px" placeholder="Поиск..." name="value" required minlength="2">
                </form>
            </div>
        </div>
    </header>

    <div class="container">
        <?= $content ?>
    </div>

    <footer>
        <div class="container">
            <div class="footer">
                &copy; Все права защищены или типа того
            </div>
        </div>
    </footer>
</section>

<!-- CART -->
<div class="modal fade" id="cart" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            Пустота
        </div>
    </div>
</div>
<!-- END CART -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
