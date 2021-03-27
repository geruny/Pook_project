<?php

class CatalogModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllBooks()
    {

        $sth = $this->db->prepare("SELECT books_id, title, date, description FROM books");
        $sth->execute();

        if ($res = $sth->fetchAll()) {
            return $res;
        } else
            return false;
    }
}
