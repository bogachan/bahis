
    $('.open-button').click(function () {
        $( ".open-up" ).toggle("slow");
    });


    $(function(){
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        var durum = parseInt($("body").data("status"));

        switch (durum)
        {
            case 0 :
                toastr.error('Hata oluştu');
                break;
            case 1 :
                toastr.success('İşlem başarılı, Kontrol ediliyor...');
                break;
            case 2 :
                toastr.info('İşlem başarılı fakat yönetici onayladıktan sonra aktifleşecektir.');
                break;

            case 3 :
                toastr.warning('Üye bilgileriniz HATALI');
                break;



        }
        //
        $('[data-toggle="tooltip"]').tooltip();

    })


    if (document.getElementsByTagName) {

        var inputElements = document.getElementsByTagName('input');

        for (i=0; inputElements[i]; i++) {

            if (inputElements[i].className && (inputElements[i].className.indexOf('disableAutoComplete') != -1)) {

                inputElements[i].setAttribute('autocomplete','off');

            }

        }

    }


    var sizeLeftMenu = document.querySelector('.left-menu').offsetHeight;
    document.querySelector('.content-page').style.minHeight = sizeLeftMenu+'px';
