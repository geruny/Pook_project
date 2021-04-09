<? require_once DIR_PATH_APP.'/views/admin/header.php'?>

<? if(count($this->arResult['ITEMS'])>0):?>
<table class="table table-dark table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Дата</th>
            <th>Описание</th>
            <th>Жанр</th>
            <th>Автор</th>
            <th>Активность</th>
            <th>Изображение</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <? foreach($this->arResult['ITEMS'] as $product): ?>
        <tr>
            <td><?= $product["books_id"] ?></td>
            <td><?= $product["title"] ?></td>
            <td><?= $product["date"] ?></td>
            <td><?= $product["description"] ?></td>
            <td><?= $product["genres"] ?></td>
            <td><?= $product["writers"] ?></td>
            <td><?= $product["active"] ?></td>
            <td><?= strlen($product["pic"]) > 0 ? "<img src='" . MAIN_PREFIX . "/upload/{$product["pic"]}' width='50px' />" : "" ?></td>
            <td>
                <button onclick="getEditFormById(<?= $product["product_id"] ?>)" class="btn btn-info">Изменить</button>
                &nbsp;
                <button onclick="sectionDelete(<?= $product["product_id"] ?>,'<?= $product["title"] ?>')" class="btn btn-danger">Удалить</button>
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
            <form id="form_new_product" name="form_new_product" method="post" action="<?= ADMIN_PREFIX ?>/products/add/">
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
                            <label for="product_code">Дата</label>
                            <input type="text" required class="form-control" name="product_date" id="product_code" placeholder="">
                        </div>
                        <label for="">Описание</label>
                        <textarea name="product_description" class="form-control" rows="3"></textarea>
                        <div class="from-group">
                            <label for="parent_section">Жанр</label>
                            <select type="text" required class="form-control" name="product_genre" id="parent_section" placeholder="">
                                <option value="0" data-dept-level="-1">.</option>
                                <? foreach($this->sections as $section): 
                                echo '<option value="'.$section['genres_id'].'">'.$section['name'].'</option>';
                                endforeach; ?>
                            </select>
                        </div>
                        <div class="from-group">
                            <label for="product_name">Автор</label>
                            <input type="text" required class="form-control" name="product_name" id="product_name" placeholder="">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input name="product_active" type="checkbox" value="Y">Опубликовать
                            </label>
                        </div>
                        <div class="from-group">
                            <label for="">Картинка обложки</label>
                            <input type="file" class="form-control" name="product_pic">
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