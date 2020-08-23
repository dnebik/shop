$('.modal-content').on('click', '.btn-next', function () {
    $.ajax({
        url: '/cart/order',
        success: function (res) {
            $('#order .modal-content').html(res);
        },
        error: function () {
            alert('Not Ok');
        }
    });

    $('#cart').modal('hide');
    $('#order').modal('show');
})

function openCart(event){
    event.preventDefault();

    $.ajax({
        url: '/cart/open',
        success: function (res) {
            $('#cart .modal-content').html(res);
            $('#cart').modal('show');
        },
        error: function () {
            alert('Not Ok');
        }
    })
};

function clearCart(event){
    event.preventDefault();

    $.ajax({
        url: '/cart/clear',
        success: function (res) {
            $('#cart .modal-content').html(res);
            $('.menu_quantity').html('');
        },
        error: function () {
            alert('Not Ok');
        }
    })
};

$('.product-button__add').on('click', function (event) {
    event.preventDefault();
    let name = $(this).data('name');

    $.ajax({
        url: '/cart/add',
        data: {name: name},
        type: 'GET',
        success: function (res) {
            $('#cart .modal-content').html(res);
            $('.menu_quantity').html('(' + $('.total-quantity').html() + ')');
        },
        error: function () {
            alert('Not Ok');
        }
    })
});

function removeFromCart (event, id) {
    event.preventDefault();

    $.ajax({
        url: '/cart/remove',
        data: {id: id},
        type: 'GET',
        success: function (res) {
            $('#cart .modal-content').html(res);
            if ($('.total-quantity').html() != '0') {
                $('.menu_quantity').html('(' + $('.total-quantity').html() + ')');
            } else {
                $('.menu_quantity').html('');
            }
        },
        error: function () {
            alert('Not Ok');
        }
    })
};