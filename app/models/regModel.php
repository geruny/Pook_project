<?php

class RegModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function registration($data)
    {
        $sth = $this->db->prepare("INSERT users (login, role, password, name, email)" .
            "VALUES (:login,:role,:password,:name,:email)");

        $sth->execute($data);

        if ($sth->rowCount() > 0) {
            return $this->db->lastInsertId();
        }
        else
            return false;
    }

    public function loginExists($login)
    {
        $sth = $this->db->prepare("SELECT users_id FROM users WHERE login= :login");
        $sth->execute(array(":login" => $login));

        if ($sth->rowCount() > 0)
            return true;
        else
            return false;
    }

    function emailExists($email)
    {
        $sth = $this->db->prepare("SELECT users_id FROM users WHERE email= :email");
        $sth->execute(array(":email" => $email));

        if ($sth->rowCount() > 0)
            return true;
        else
            return false;
    }

    public function authorization($data)
    {
        $sth = $this->db->prepare("SELECT users_id, name, role, login, email FROM users WHERE login=:login AND password =:password");
        $sth->execute(array(":login" => $data["login"], ":password" => md5($data["password"])));

        if ($res = $sth->fetch(PDO::FETCH_ASSOC)){
            return $res;
        }
        else
            return false;
    }
}
