<?php

use yii\helpers\Url;
use app\widgets\Goods;

?>

<div class="container">
    <nav class="nav nav-menu">
        <a class="nav-link active" href="/category">Всё меню</a>
        <? foreach ($categorys as $category) { ?>
            <a class="nav-link" href="<?= Url::to(["/category", 'type' => $category->cat_name]) ?>">
            <?= $category->browser_name ?></a>
        <? } ?>
    </nav>
</div>

<? Goods::begin(["goods" => $goods]); ?>
<? Goods::end(); ?>