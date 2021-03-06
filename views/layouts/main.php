<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\AppAsset;
use yii\helpers\Url;
use app\models\Cart;

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
                <?
                if (Yii::$app->user->isGuest) {
                ?>
                    <a href="<?= Url::to("/admin/login") ?>">Вход в админку</a>
                <? } else {?>
                    <a href="<?= Url::to("/admin") ?>">Админка</a>
                    <a href="<?= Url::to("/admin/logout") ?>">Выход из админки</a>
                <? } ?>
                <a onclick="openCart(event)" href="#">Корзина <span class="menu_quantity">
                        <?
                            $totalCount = Cart::getFullCount();
                            if ($totalCount) {
                                echo "($totalCount)";
                            }
                        ?>
                    </span></a>
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
            ...
        </div>
    </div>
</div>
<!-- END CART -->
<!-- ORDER -->
<div class="modal fade" id="order" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            ...
        </div>
    </div>
</div>
<!-- END ORDER -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
