<?php

use app\widgets\Goods;

?>

<h1>Результат поиска по запросу "<?= $value ?>":</h1>

<? if ($goods) {
    Goods::begin(["goods" => $goods]);
    Goods::end();
} else { ?>
    <h2>Результат поиска ничего не дал.</h2>
<? } ?>
