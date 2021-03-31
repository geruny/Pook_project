$(document).ready(function () {

    $('#form_new_section').submit(function (event) {
        event.preventDefault();
        let data = $('#form_new_section').serializeArray();

        $.ajax({
            url: window.BASE_DIR + "/sections/add/",
            data: data,
            dataType: "json",
            type:"POST",
            success: function (json) {
                if (json.error > 0)
                    $(".error_danger").show();
                else{
                    location.reload();
                }
            }

        });
    })

})