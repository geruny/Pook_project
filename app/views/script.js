$(document).ready(function () {

    $('.nav-item a').filter(function () {
        return this.href === location.href;
    }).addClass('active');

})

function openDialogLogin() {

    let modal = ``;

    $.ajax({
        url: window.BASE_DIR_AJAX + "/loginForm.php",
        dataType: "html",
        success: function (html) {

            $('body').append(html);

            let modalObj = new bootstrap.Modal(document.getElementById('login_form'));

            $('#login_form').on('hide.bs.modal', function (event) {
                $(this).remove();
            });

            $('#login_form').submit(function (event) {
                globalLogin(event);
            })

            modalObj.show();
        }
    })
}

function globalLogin(event) {

    event.preventDefault();
    let form = $(event.target);
    let form_data = form.serializeArray();

    $.ajax({
        url: "/petrov/Books_site/reg/login/",
        type: "POST",
        data: form_data,
        dataType: "json",
        beforeSend: function () {

            form.find('alert-danger').addClass('d-none');
            form.find('input').each(function (i, e) {
                $(e).attr('disabled')
            });
            form.find('button[type="submit"]').hide();
            form.find('.loader04').removeClass('d-none');
        },
        success: function (json) {
            if (json.error != '') {

                form.find('.alert-danger').text(json.error).removeClass('d-none');
                form.find('input').each(function (i, e) {
                    $(e).removeAttr('disabled');
                });
                form.find('button[type="submit"]').show();
                form.find('.loader04').addClass('d-none');
            } else {
                if (location.href == 'http://dpi2021.mt-site.ru/petrov/Books_site/reg')
                    location.replace('http://dpi2021.mt-site.ru/petrov/Books_site/lk');
                else
                    location.reload();
            }
        }
    })
}