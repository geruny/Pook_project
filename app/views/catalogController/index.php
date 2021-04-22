<?php require_once DIR_PATH_APP . '/views/header.php' ?>


<!-- Libs\App::includeComponent('catalog')  -->

<? if(count($this->arResult['books'])>0):?>
<div class="container">
    <h1>Архив книг</h1>
    <? foreach($this->arResult['books'] as $book): ?>
    <div class="book_container">

        <div class="row">
            <h2><?= $book["title"] ?></h2>
        </div>
        <div class="row">
            <div class="col-5">
                <?= strlen($book["pic"]) > 0 ? "<img src='" . MAIN_PREFIX . "/upload/{$book["pic"]}' width='300px' />" : "" ?>
            </div>
            <div class="col-5">
                <div class="row">
                    <div class="col-3">
                        <p>Авторы:</p>
                    </div>
                    <div class="col">
                        <p><?= $book["writers_name"] ?>&ensp;<?= $book["middle_name"] ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <p>Жанр:</p>
                    </div>
                    <div class="col">
                        <p><?= $book["genres_name"] ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <p> Дата выхода:</p>
                    </div>
                    <div class="col">
                        <p><?= $book["date"] ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p>
                            Описание:</br>
                            <?= $book["description"] ?>
                        </p>
                    </div>
                </div>
                <div class="row file">
                    <? if(strlen($book["download"]) > 0) {?>
                    <div class="col">
                        <a class="nav-link" download="" href="<?= MAIN_PREFIX . "/upload/{$book["download"]}" ?>">Скачать книгу</a>
                    </div>
                    <div class="col">
                        <a class="nav-link" href="<?= MAIN_PREFIX . "/upload/{$book["download"]}" ?>" target="_blank">Читать онлайн</a>
                    </div>
                    <?} else {?>
                    <div class="col">
                        <a class="nav-link">Нет в архиве</a>
                    </div>
                    <?}?>
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