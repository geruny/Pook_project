<?php

class Model
{

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getList($table, $order = "id asc", $select = "*", $filter = "1=1")
    {
        $order=$table.'_'.$order;

        $sth = $this->db->prepare("SELECT " . $select . " FROM "
            . $table . " WHERE " . $filter . " ORDER BY " . $order);

        $sth->execute(array());
        
        if ($sth->rowCount() > 0) {
            return $sth->fetchAll(PDO::FETCH_ASSOC);
        }
        else
            return false;
    }

    public function delete($table, $attr, $value)
    {
        $sth = $this->db->prepare("DELETE FROM " . $table . " WHERE " . $attr . " = " . $value);
        $sth->execute(array());

        if ($sth->rowCount() > 0)
            return true;
        else
            return false;
    }
}
