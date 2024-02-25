$(function () {
    $('.bs-select').select2({
        theme: "bootstrap-5",
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        closeOnSelect: false,
    });

    $('.add-products').click(function (e) {
        e.preventDefault();

        let productWrapper = $('.product-wrapper'),
            emptyAlert = $('.product-list-empty');

        $.ajax({
            type: 'GET',
            cache: false,
            url: $(this).data('url'),
            success: function (response) {
                productWrapper.append(response);
                if (productWrapper.find('.product-item').length !== 0) {
                    emptyAlert.addClass('d-none');
                }
            },
            error: function () {
                console.log('Error. Add-products ajax.');
            }
        });
    });

    $(document).on('click', '.product-delete', function (e) {
        e.preventDefault();

        let productWrapper = $('.product-wrapper'),
            emptyAlert = $('.product-list-empty');

        if (confirm('Ar tikrai norite pašalinti?')) {
            $(this).closest('.product-item').remove();
        }

        if (productWrapper.find('.product-item').length === 0) {
            emptyAlert.removeClass('d-none');
        }
    });
});
