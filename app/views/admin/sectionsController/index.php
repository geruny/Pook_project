<? require_once DIR_PATH_APP.'/views/admin/header.php'?>

<table class="table table-dark table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Имя</th>
            <th>Код</th>
            <th>Уровень</th>
            <th>Кол-во подкатегорий</th>
            <th>Родитель</th>
            <th>Действия</th>
        </tr>
    </thead>
    <tbody>

    </tbody>
    <tfoot></tfoot>

</table>

<div class="row">
    <div class="col-md-12">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#new_section_modal">
            Добавить
        </button>
    </div>
</div>

<div class="modal fade" id="new_section_modal" tabindex="-1" role="dialog" aria-labelledby="new_section_modal_title" aria hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="new_section_title">Добавление категории</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger error_danger" style="display:none" role="alert">
                    Ошибка!
                </div>
                <div class="mx-auto">
                    <form id="form_new_section" method="post" action="<?= ADMIN_PREFIX ?>/sections/add/">
                        <div class="from-group">
                            <label for="section_name">Название категории</label>
                            <input type="text" required class="form-control" name="section_name" id="section_name" placeholder="">
                        </div>
                        <div class="from-group">
                            <label for="section_code">Код категории</label>
                            <input type="text" required class="form-control" name="section_code" id="section_code" placeholder="">
                        </div>
                        <div class="from-group">
                            <label for="parent-section">Родительская категория</label>
                            <select type="text" required class="form-control" name="parent-section" id="parent-section" placeholder="">
                                <option value="0" data-dept-level="-1">.</option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="add_new_section" onclick="add_new_section()">Добавить</button>
            </div>
        </div>
    </div>
</div>



<? require_once DIR_PATH_APP.'/views/admin/footer.php'?>