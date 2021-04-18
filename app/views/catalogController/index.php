<?php require_once DIR_PATH_APP . '/views/header.php' ?>

<h1>Каталог</h1>

<!-- Libs\App::includeComponent('catalog')  -->

<? if(count($this->arResult['books'])>0):?>
<table class="table table-dark table-striped">
    <thead>
        <tr>
            <th>Название</th>
            <th>Автор</th>
            <th>Жанр</th>
            <th>Дата выхода</th>
            <th>Описание</th>
            <th>Изображение</th>
        </tr>
    </thead>
    <tbody>
        <? foreach($this->arResult['books'] as $book): ?>
        <tr>
            <td><?= $book["title"] ?></td>
            <td><?= $book["writers_name"] ?></br><?= $book["middle_name"] ?></td>
            <td><?= $book["genres_name"] ?></td>
            <td><?= $book["date"] ?></td>
            <td><?= $book["description"] ?></td>
            <td><?= strlen($book["pic"]) > 0 ? "<img src='" . MAIN_PREFIX . "/upload/{$book["pic"]}' width='50px' />" : "" ?></td>
        </tr>
        <? endforeach;?>
    </tbody>
    <tfoot></tfoot>
</table>
<? else:?>
<div class="alert alert-danger error_danger" role="alert">
    Ошибка вывода каталога или каталог пуст :(
</div>
<? endif ?>




<?php require_once DIR_PATH_APP . '/views/footer.php' ?>