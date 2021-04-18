<?php require_once DIR_PATH_APP . '/views/header.php' ?>

<h1>Каталог</h1>

<?= Libs\App::includeComponent('catalog') ?>

<? if(count($this->arResult['books'])>0):?>
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
        </tr>
    </thead>
    <tbody>
        <? foreach($this->arResult['books'] as $product): ?>
        <tr>
            <td><?= $product["books_id"] ?></td>
            <td><?= $product["title"] ?></td>
            <td><?= $product["date"] ?></td>
            <td><?= $product["description"] ?></td>
            <td><?= $product["genres"] ?></td>
            <td><?= $product["writers"] ?></td>
            <td><?= $product["active"] ?></td>
            <td><?= strlen($product["pic"]) > 0 ? "<img src='" . MAIN_PREFIX . "/upload/{$product["pic"]}' width='50px' />" : "" ?></td>
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




<?php require_once DIR_PATH_APP . '/views/footer.php' ?>