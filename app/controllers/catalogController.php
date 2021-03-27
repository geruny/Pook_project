<?php

use Libs\Book as Book;

class CatalogController extends Controller
{
    public function __construct($prefix)
    {
        parent::__construct($prefix);

        $books = $this->model->getAllBooks();
        $this->view->books = $books;

        $this->view->setTitle("Каталог");
    }
  
    public function getBookById()
    {
        $id = htmlspecialchars($_POST['books_id']);
        $books = $this->model->getAllBooks();
        $this->view->books=$books;

        echo '<pre>';
        var_dump($books);
        echo '</pre>';

        $book = array_search($id, $books);
        Book::getBookInfo($book);
    }
}


