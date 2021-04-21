<?php

class CatalogModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getListBooks()
    {
        $sth = $this->db->prepare("SELECT books.*, writers.name as writers_name, writers.middle_name, GROUP_CONCAT(genres.name) as genres_name 
            FROM books 
            JOIN books_has_writers ON books_has_writers.books_id=books.books_id 
            JOIN writers ON writers.writers_id=books_has_writers.writers_id 
            JOIN books_has_genres ON books_has_genres.books_id=books.books_id 
            JOIN genres ON genres.genres_id=books_has_genres.genres_id
            GROUP BY books.books_id ");

        $sth->execute(array());

        if ($sth->rowCount() > 0) {
            return $sth->fetchAll(PDO::FETCH_ASSOC);
        } else
            return false;
    }
}
