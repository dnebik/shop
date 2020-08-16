<?php

use yii\helpers\Url;

?>


<div class="container">
    <nav class="nav nav-menu">
        <a class="nav-link active" href="/category">Всё меню</a>
        <? foreach ($categorys as $category) { ?>
            <a class="nav-link" href="<?= Url::to(["/category", "type" => $category->cat_name ]) ?>">
            <?= $category->browser_name ?></a>
        <? } ?>
    </nav>
</div>

<div class="container">
    <div class="row justify-content-center">

        <? foreach ($goods as $good) { ?>
        <div class="col-4">
            <div class="product">
                <div class="product-img">
                    <img src="/img/<?= $good->img ?>" alt="<?= $good->name ?>">
                </div>
                <div class="product-name"><?= $good->name ?></div>
                <div class="product-descr"><?= $good->descr ?></div>
                <div class="product-price">Цена: <?= $good->price ?> рублей</div>
                <div class="product-buttons">
                    <button type="button" class="product-button__add btn btn-success">Заказать</button>
                    <button type="button" class="product-button__more btn btn-primary">Подробнее</button>
                </div>
            </div>
        </div>
        <? } ?>
    </div>
</div>