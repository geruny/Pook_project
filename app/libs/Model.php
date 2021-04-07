<?php

class Model
{

    public function __construct()
    {
        $this->db = new Database;
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

    public function delete($table, $attr, $value)
    {
        $sth = $this->db->prepare("DELETE FROM " . $table . " WHERE " . $attr . " = " . $value);
        $sth->execute(array());

        if ($sth->rowCount() > 0)
            return true;
        else
            return false;
    }

    public function getById($id, $table, $select = "*")
    {
        $table_id = $table . '_' . $id;

        if (is_array($select)) {
            $select = implode(", ", $select);
        }

        $sth = $this->db->prepare("SELECT " . $select . " FROM "
            . $table . " WHERE " . $table_id . "= :id");

        $sth->execute(array(":id" => $id));

        if ($sth->rowCount() > 0) {
            return $sth->fetchAll(PDO::FETCH_ASSOC);
        } else
            return false;
    }
}
