$(document).ready(function () {

    $('#form_new_section').submit(function (event) {
        event.preventDefault();
        let data = $('#form_new_section').serializeArray();

        $.ajax({
            url: window.BASE_DIR + "/sections/add/",
            data: data,
            dataType: "json",
            type: "POST",
            success: function (json) {
                if (json.error > 0){
                    $("#new_section_modal .error_danger").show();
                }
                else{
                    location.reload();
                }
            }
        });
    })
})

function sectionDelete(id, name) {
    if (confirm("Удалить категорию \"" + name + "\" c id = " + id + "?")) {
        $.ajax({
            url: window.BASE_DIR + "/sections/del/",
            data: {
                id: id
            },
            dataType: "json",
            type: "POST",
            success: function (json) {
                if (json.error > 0)
                    alert("Ошибка")
                else {
                    location.reload();
                }
            }
        })
    }
}