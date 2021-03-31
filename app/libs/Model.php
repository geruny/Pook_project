<?php

class Model
{

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getList($table, $order = "id asc", $select = "*", $filter = "1=1")
    {
        $sth = $this->db->prepare("SELECT " . $select . " FROM "
            . $table . " WHERE " . $filter . " ORDER BY " . $order);

        $sth->execute(array());

        if ($sth->rowCount() > 0)
            return $sth->fetchAll(PDO::FETCH_ASSOC);
        else
            return false;
    }
}
