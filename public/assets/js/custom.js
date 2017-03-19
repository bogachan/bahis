$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN':csrfToken
    }
});

    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "1000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

    var durum = parseInt($("body").data("status"));

    switch (durum)
    {
        case 0 :
            toastr.error('Hata oluştu');
            break;
        case 1 :
            toastr.success('İşlem başarılı.');
            break;
        case 2 :
            toastr.info('İşlem başarılı fakat yönetici onayladıktan sonra aktifleşecektir.');
            break;

        case 3 :
            toastr.warning('Zaten daha önce yazarlık talebinde bulunmuşsunuz.');
            break;

    }

    $('[data-toggle="tooltip"]').tooltip();

    $('.summernote').summernote({
        height: 300,
        lang: 'tr-TR'
    });





