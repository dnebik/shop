<?

/* @var $session */

if (isset($session['cart'])) {
    $cart = $session['cart'];
}

use app\models\Cart; ?>
<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Корзина</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <table class="table table-striped">

        <thead>
        <tr>
            <th scope="col">Фото</th>
            <th scope="col">Наименование</th>
            <th scope="col">Количество</th>
            <th scope="col">Цена</th>
            <th scope="col"></th>
        </tr>
        </thead>

        <tbody>
        <?
        if (isset($cart)) {
            foreach ($cart as $id => $item) {
                $price = $item['price'] * $item['count'];
                ?>
                <tr>
                    <td style="vertical-align: middle" width="150"><img src="/img/<?= $item['img'] ?>"
                                                                        alt="<?= $item['name'] ?>"></td>
                    <td style="vertical-align: middle"><?= $item['name'] ?></td>
                    <td style="vertical-align: middle"><?= $item['count'] ?></td>
                    <td style="vertical-align: middle"><?= $price ?> рублей</td>
                    <td onclick="removeFromCart(event, <?= $id ?>)" class="delete"
                        style="text-align: center; cursor: pointer; vertical-align: middle; color: red; font-weight: 1000;">
                        <span>✕</span></td>
                </tr>
            <? }
        } ?>
        <tr style="border-top: 4px solid black">
            <td colspan="4">Всего товаров</td>
            <td class="total-quantity"><?= Cart::getFullCount(); ?></td>
        </tr>
        <tr>
            <td colspan="4">На сумму</td>
            <td style="font-weight: 700"><?= Cart::getFullPrice(); ?> рублей</td>
        </tr>
        </tbody>

    </table>
</div>
<div class="modal-footer">
    <button onclick="clearCart(event)" type="button" class="btn btn-danger" <?= (Cart::getFullPrice() == 0) ? 'disabled' : '' ?>>Очистить корзину</button>
<!--    <button type="button" class="btn btn-secondary btn-close">Продолжить покупки</button>-->
    <button type="button" class="btn btn-success btn-next" <?= (Cart::getFullPrice() == 0) ? 'disabled' : '' ?>>Оформить заказ</button>
</div>