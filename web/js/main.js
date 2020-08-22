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
        },
        error: function () {
            alert('Not Ok');
        }
    })
};