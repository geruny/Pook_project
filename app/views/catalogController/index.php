<?php require_once DIR_PATH_APP . '/views/header.php' ?>


<!-- Libs\App::includeComponent('catalog')  -->

<? if(count($this->arResult['books'])>0):?>
<div class="container">
    <h1>Архив книг</h1>
    <? foreach($this->arResult['books'] as $book): ?>
    <div class="row">
        <h2><?= $book["title"] ?></h2>
    </div>
    <div class="row">
        <div class="col-5">
            <?= strlen($book["pic"]) > 0 ? "<img src='" . MAIN_PREFIX . "/upload/{$book["pic"]}' width='300px' />" : "" ?>
        </div>
        <div class="col-5">
            <div class="row">
                <div class="col-3">Авторы:</div>
                <div class="col"><?= $book["writers_name"] ?>&ensp;<?= $book["middle_name"] ?></div>
            </div>
            <div class="row">
                <div class="col-3">Жанр:</div>
                <div class="col"><?= $book["genres_name"] ?></div>
            </div>
            <div class="row">
                <div class="col-3">Дата выхода:</div>
                <div class="col"><?= $book["date"] ?></div>
            </div>
            <div class="row">
                <div class="col">
                    Описание:</br>
                    <?= $book["description"] ?>
                </div>
            </div>
        </div>
    </div>
    <? endforeach;?>
</div>
<? else:?>
<div class="alert alert-danger error_danger" role="alert">
    Ошибка вывода каталога или каталог пуст :(
</div>
<? endif ?>


<?php require_once DIR_PATH_APP . '/views/footer.php' ?>