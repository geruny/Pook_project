<? require_once DIR_PATH_APP.'/views/admin/header.php'?>

<? if(count($this->arResult[ITEMS])>0):?>
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
        <? foreach($this->arResult[ITEMS] as $section): ?>
        <tr>
            <td><?= $section["id"] ?></td>
            <td><?= $section["name"] ?></td>
            <td><?= $section["code"] ?></td>
            <td><?= $section["depth_level"] ?></td>
            <td></td>
            <td><?= $section["parent_id"] ?></td>
            <td>
                <a href="javascript:;" onclick="" class="bg-info">Изменить</a>
                <a href="javascript:;" onclick='sectionDelete(<?= $section["id"] ?>,<?= $section["name"] ?>)' class="bg-danger">Удалить</a>
            </td>
        </tr>
        <? endforeach;?>
    </tbody>
    <tfoot></tfoot>
</table>
<? else:?>
<div class="alert alert-danger error_danger" role="alert">
    Нет категорий по вашему запросу
</div>
<? endif ?>

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
            <form id="form_new_section" method="post" action="<?= ADMIN_PREFIX ?>/sections/add/">
                <div class="modal-body">
                    <div class="alert alert-danger error_danger" style="display: none" role="alert">
                        Ошибка!
                    </div>
                    <div class="mx-auto">
                        <input type="hidden" value="0" name="depth_level" />
                        <div class="from-group">
                            <label for="section_name">Название категории</label>
                            <input type="text" required class="form-control" name="section_name" id="section_name" placeholder="">
                        </div>
                        <div class="from-group">
                            <label for="section_code">Код категории</label>
                            <input type="text" required class="form-control" name="section_code" id="section_code" placeholder="">
                        </div>
                        <div class="from-group">
                            <label for="parent_section">Родительская категория</label>
                            <select type="text" required class="form-control" name="parent_section" id="parent_section" placeholder="">
                                <option value="0" data-dept-level="-1">.</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="add_new_section">Добавить</button>
                </div>
            </form>
        </div>
    </div>
</div>



<? require_once DIR_PATH_APP.'/views/admin/footer.php'?>