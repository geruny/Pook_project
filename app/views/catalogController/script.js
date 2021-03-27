$(document).ready(function () {

    $('#book_form').submit(function (event) {

        event.preventDefault();
        let form = $(event.target);
        let form_data = form.serializeArray();
        let data = [];

        for (let item in form_data) {
            data[form_data[item]['name']] = form_data[item]['value'];
        }

        let obj = {};
        Object.assign(obj, data);
        $.ajax({
            url: "/petrov/Books_site/catalog/getBookById",
            type: "POST",
            data: obj,
            dataType: "json",
            success: function (json) {
                if (json.error.length > 0)
                    console.log(json.error)
                else
                    alert('передалось')
            }
        })

    })

});