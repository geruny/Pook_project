
<div class="modal fade" id="edit_section_modal" tabindex="-1" role="dialog" aria-labelledby="new_section_modal_title" aria hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="new_section_title">Редактирование категории</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_edit_section" method="post" action="<?= ADMIN_PREFIX ?>/sections/edit/">
                <div class="modal-body">
                    <div class="alert alert-danger error_danger" style="display: none" role="alert">
                        Ошибка!
                    </div>
                    <div class="mx-auto">
                        <input type="hidden" name="id" value="<?= $this->section["genres_id"] ?>" />
                        <div>Изменить ID = <span class="edit_id"><?= $this->section["genres_id"] ?></span></div>
                        <div class="from-group">
                            <label for="section_name">Название жанра</label>
                            <input type="text" required class="form-control" name="section_name" id="section_name" placeholder="" value="<?= $this->section["name"] ?>">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" onclick="sectionEdit()">Изменить</button>
                </div>
            </form>
        </div>
    </div>
</div>