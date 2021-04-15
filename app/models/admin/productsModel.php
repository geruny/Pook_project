<?php

class ProductsModel extends Model
{
    public function __construct()
    {
        parent::__construct();
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

    public function getList($table, $order = "id asc", $select = "*", $filter = "1=1")
    {
        $order = $table . '_' . $order;

        if (is_array($select)) {
            $select = implode(", ", $select);
        }

        $sth = $this->db->prepare("SELECT " . $select . " FROM "
        . $table . " WHERE " . $filter . " ORDER BY " . $order);

        $sth->execute(array());

        if ($sth->rowCount() > 0) {
            return $sth->fetchAll(PDO::FETCH_ASSOC);
        } else
            return false;
    }

}
