<? require_once DIR_PATH_APP.'/views/admin/header.php'?>

<div class="row">
    <div class="col-md-12">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#new_product_modal">
            Добавить книгу
        </button>
    </div>
</div>

<div class="modal fade" id="new_product_modal" tabindex="-1" role="dialog" aria-labelledby="new_product_modal_title" aria hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="new_product_title">Добавление книги</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_new_product" name="form_new_product"  method="post" action="<?= ADMIN_PREFIX ?>/products/add/">
                <div class="modal-body">
                    <div class="alert alert-danger error_danger" style="display: none" role="alert">
                        Ошибка!
                    </div>
                    <div class="mx-auto">
                        <div class="from-group">
                            <label for="product_name">Название книги</label>
                            <input type="text" required class="form-control" name="product_name" id="product_name" placeholder="">
                        </div>
                        <div class="from-group">
                            <label for="product_code">Код книги</label>
                            <input type="text" required class="form-control" name="product_code" id="product_code" placeholder="">
                        </div>
                        <div class="from-group">
                            <label for="parent_section">Жанр(категория)</label>
                            <select type="text" required class="form-control" name="parent_section" id="parent_section" placeholder="">
                                <option value="0" data-dept-level="-1">.</option>
                                <? foreach($this->sections as $section): ?>
                                echo '<option value="'.$section['id'].'">'.$section['name'].'</option>';
                                <? endforeach; ?>
                            </select>
                        </div>
                        <div class="from-group">
                            <label for="product_price">Цена</label>
                            <input type="text" required class="form-control" name="product_price" id="product_price" placeholder="">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input name="product_amount" type="checkbox" value="Y">В наличии
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input name="product_active" type="checkbox" value="Y">Активный
                            </label>
                        </div>
                        <label for="">Описание</label>
                        <textarea name="priduct-description" class="form-control" rows="3"></textarea>
                        <div class="from-group">
                            <label for="">Картинка анонса</label>
                            <input type="file" class="form-control" name="product_p_img">
                        </div>
                        <div class="from-group">
                            <label for="">Детальная картинка</label>
                            <input type="file" class="form-control" name="product_d_img">
                        </div>
                        <div class="from-group">
                            <label for="">Дополнительное изображение</label>
                            <input type="file" class="form-control" name="product_imgs" multiple>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="add_new_product">Добавить</button>
                </div>
            </form>
        </div>
    </div>
</div>

<? require_once DIR_PATH_APP.'/views/admin/footer.php'?>