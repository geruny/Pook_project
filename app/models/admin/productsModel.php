<?php

class ProductsModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getListBooks()
    {
        $sth = $this->db->prepare("SELECT books.*, writers.writers_id, writers.name as writers_name, writers.middle_name, writers.date_of_birth,writers.date_of_death, genres.genres_id, GROUP_CONCAT(genres.name) as genres_name 
            FROM books 
            JOIN books_has_writers ON books_has_writers.books_id=books.books_id 
            JOIN writers ON writers.writers_id=books_has_writers.writers_id 
            JOIN books_has_genres ON books_has_genres.books_id=books.books_id 
            JOIN genres ON genres.genres_id=books_has_genres.genres_id
            GROUP BY books.books_id");

        $sth->execute(array());

        if ($sth->rowCount() > 0) {
            return $sth->fetchAll(PDO::FETCH_ASSOC);
        } else
            return false;
    }

    public function add($data)
    {
        $sth = $this->db->prepare(
            "INSERT INTO books (title, date, desciption) " .
            " VALUE (:title, :date, :description);"
        );

        $sth->execute($data);

        if ($sth->rowCount() > 0) {
            return $this->db->lastInsertId();
        } else
            return false;
    }

}
