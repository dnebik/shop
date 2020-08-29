<?php

/* @var $categorys */
/* @var $goods */

error_log(json_encode($_GET));

use yii\helpers\Url;
use app\widgets\Goods;

?>

<div class="container">
    <nav class="nav nav-menu">
        <a class="nav-link <?= (!$_GET['type']) ? "active" : "" ?>" href="/category">Всё меню</a>
        <? foreach ($categorys as $category) { ?>
            <a class="nav-link <?= ($_GET['type'] == $category->cat_name) ? "active" : "" ?>" href="<?= Url::to(["/category", 'type' => $category->cat_name]) ?>">
            <?= $category->browser_name ?></a>
        <? } ?>
    </nav>
</div>

<? Goods::begin(["goods" => $goods]); ?>
<? Goods::end(); ?>