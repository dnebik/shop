<?php
    use app\models\Cart;

    /* @var $session */
?>

<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"></head><body><div class="table-responsive">
    <table class="table table-hover table-striped">
        <thead>
        <tr>
            <th style="padding: 8px; border: 1px solid #ddd">Наименование</th>
            <th style="padding: 8px; border: 1px solid #ddd">Количество</th>
            <th style="padding: 8px; border: 1px solid #ddd">Цена</th>
            <th style="padding: 8px; border: 1px solid #ddd">Сумма</th>
        </tr>
        </thead>
        <tbody>
        <?
        foreach ($session['cart'] as $item) {
        ?>
            <tr>
                <td style="padding: 8px; border: 1px solid #ddd"><?= $item['name'] ?></td>
                <td style="padding: 8px; border: 1px solid #ddd"><?= $item['count'] ?></td>
                <td style="padding: 8px; border: 1px solid #ddd"><?= $item['price'] ?> рублей</td>
                <td style="padding: 8px; border: 1px solid #ddd"><?= $item['price'] * $item['count'] ?> рублей</td>
            </tr>
        <? } ?>
        <tr>
            <td colspan="3">Итого:</td>
            <td><?= Cart::getFullCount() ?> шт</td>
        </tr>
        <tr>
            <td colspan="3">На сумму:</td>
            <td><b><?= Cart::getFullPrice() ?></b> рублей</td>
        </tr>
        </tbody>
    </table>
</div></body></html>