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
                if (json.error > 0) {
                    $("#new_section_modal .error_danger").show();
                } else {
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

function sectionEdit() {
    $('#form_edit_section').submit(function (event) {
        event.preventDefault();
        let data = $('#form_edit_section').serializeArray();

        $.ajax({
            url: window.BASE_DIR + "/sections/edit/",
            data: data,
            dataType: "json",
            type: "POST",
            success: function (json) {
                if (json.error > 0) {
                    alert('good');
                    $("#form_edit_section .error_danger").show();
                } else {
                    location.reload();
                }
            }
        });
    })
}

function getEditFormById(id) {
    $.ajax({
        url: window.BASE_DIR + `/sections/getEditFormById/${id}/`,
        dataType: "html",
        type: "POST",
        success: function (html) {
            $('div.main').append(html);
            $('#edit_section_modal').on('hidden.bs.modal', function (e) {
                $(e.target).remove();
            });
            $('#edit_section_modal').modal('show');
        }
    })
}