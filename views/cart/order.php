<?php

use yii\widgets\ActiveForm;
use app\models\Order;

/* @var $order Order */

?>

<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Оформление заказа</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<? $form = ActiveForm::begin() ?>
    <div class="modal-body">
        <?= $form->field($order, 'name') ?>
        <?= $form->field($order, 'email') ?>
        <?= $form->field($order, 'phone') ?>
        <?= $form->field($order, 'address') ?>
    </div>

    <div class="modal-footer">
        <button class="btn btn-success">Оформить</button>
    </div>
<? ActiveForm::end() ?>
