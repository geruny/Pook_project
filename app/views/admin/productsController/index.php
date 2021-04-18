<? require_once DIR_PATH_APP.'/views/admin/header.php'?>

<div class="row">
    <div class="col-md-12">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#new_book_modal">
            Добавить книгу
        </button>
    </div>
</div>
</br>

<? if(count($this->arResult['books'])>0):?>
<table class="table table-dark table-striped">
    <thead>
        <tr>
            <th>ID Книги</th>
            <th>Название</th>
            <th>ID Автора</th>
            <th>Автор</th>
            <th>ID Жанра</th>
            <th>Жанр</th>
            <th>Дата выхода</th>
            <th>Описание</th>
            <th>Изображение</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <? foreach($this->arResult['books'] as $book): ?>
        <tr>
            <td><?= $book["books_id"] ?></td>
            <td><?= $book["title"] ?></td>
            <td><?= $book["writers_id"] ?></td>
            <td><?= $book["writers_name"] ?></br><?= $book["middle_name"] ?></td>
            <td><?= $book["genres_id"] ?></td>
            <td><?= $book["genres_name"] ?></td>
            <td><?= $book["date"] ?></td>
            <td><?= $book["description"] ?></td>
            <td><?= strlen($book["pic"]) > 0 ? "<img src='" . MAIN_PREFIX . "/upload/{$book["pic"]}' width='50px' />" : "" ?></td>
            <td>
                <button onclick="getEditFormById(<?= $book["book_id"] ?>)" class="btn btn-info">Изменить</button>
                &nbsp;
                <button onclick="sectionDelete(<?= $book["book_id"] ?>,'<?= $book["title"] ?>')" class="btn btn-danger">Удалить</button>
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

<div class="modal fade" id="new_book_modal" tabindex="-1" role="dialog" aria-labelledby="new_book_modal_title" aria hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="new_book_title">Добавление книги</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_new_book" name="form_new_book" method="post" action="<?= ADMIN_PREFIX ?>/books/add/">
                <div class="modal-body">
                    <div class="alert alert-danger error_danger" style="display: none" role="alert">
                        Ошибка!
                    </div>
                    <div class="mx-auto">
                        <div class="from-group">
                            <label for="book_name">Название книги</label>
                            <input type="text" required class="form-control" name="book_name" id="book_name" placeholder="">
                        </div>
                        <div class="from-group">
                            <label for="book_date">Дата</label>
                            <input type="text" required class="form-control" name="book_date" id="book_date" placeholder="">
                        </div>
                        <label for="book_description">Описание</label>
                        <textarea name="book_description" class="form-control" rows="3"></textarea>
                        <div class="from-group">
                            <label for="book_genre">Жанр</label>
                            <select type="text" required class="form-control" name="book_genre" id="book_genre" placeholder="">
                                <option value="0">Выберите жанр</option>
                                <? foreach($this->sections as $section): 
                                echo '<option value="'.$section['genres_id'].'">'.$section['name'].'</option>';
                                endforeach; ?>
                            </select>
                        </div>
                        <div class="from-group">
                            <label for="book_writer_name">Имя автора</label>
                            <input type="text" required class="form-control" name="book_writer_name" id="book_writer_name" placeholder="">
                        </div>
                        <div class="from-group">
                            <label for="book_writer_middle_name">Фамилия автора</label>
                            <input type="text" required class="form-control" name="book_writer_middle_name" id="book_writer_middle_name" placeholder="">
                        </div>
                        <div class="from-group">
                            <label for="book_pic">Картинка обложки</label>
                            <input type="file" class="form-control" name="book_pic">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="add_new_book">Добавить</button>
                </div>
            </form>
        </div>
    </div>
</div>

<? require_once DIR_PATH_APP.'/views/admin/footer.php'?>