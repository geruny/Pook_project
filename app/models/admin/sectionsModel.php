<?php

class SectionsModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function add($data)
    {
        $sth = $this->db->prepare(
            "INSERT INTO sections (name, code, depth_level, parent_id) " .
                " VALUE (:name, :code, :depth_level, :parent_id);"
        );

        $sth->execute($data);

        if ($sth->rowCount() > 0)
            return $sth->db->lastInsertId();
        else
            return false;
    }
}
