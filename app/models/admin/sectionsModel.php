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
            "INSERT INTO genres (name) " .
                " VALUE (:name);"
        );

        $sth->execute($data);

        if ($sth->rowCount() > 0) {
            return $this->db->lastInsertId();
        }
        else
            return false;
    }

    public function edit($data)
    {
        $sth = $this->db->prepare(
            "UPDATE genres name=:name " .
            " WHERE genres_id=:id;"
        );

        $sth->execute($data);

        if ($sth->rowCount() > 0) {
            return true;
        } else
            return false;
    }
   
}
