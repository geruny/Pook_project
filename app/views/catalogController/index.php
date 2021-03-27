<?php require_once DIR_PATH_APP . '/views/header.php' ?>

<h1>Каталог</h1>

<form id="book_form">
    <div class="mb-3">
        <label for="name" class="form-label">ID Book</label>
        <input type="text" class="form-control" id="books_id" name="books_id" required="true">
    </div>
    <button type="submit" class="btn btn-primary">ыыы</button>
</form>
<h2><?= Libs\Book::getBookTitle(); ?></h2>

<?
foreach ($this->books as $value) {

    echo "id=".$value["books_id"]." Название: ".$value["title"]."<br/>";

}
?>


<?php require_once DIR_PATH_APP . '/views/footer.php' ?>