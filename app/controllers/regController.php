<?php

use Libs\User as User;

class RegController extends Controller
{
    public function __construct($prefix)
    {
        parent::__construct($prefix);

        $this->view->setTitle("Регистрация");
    }

    public function registration()
    {
        $name = htmlspecialchars($_POST['name']);
        $login = htmlspecialchars($_POST['login']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $passwordConfirm = htmlspecialchars($_POST['passwordConfirm']);

        if ($password == $passwordConfirm) {

            if ($this->model->loginExists($login)) {
                echo json_encode(array("error" => "Логин уже существует"));
                die;
            }

            if ($this->model->emailExists($email)) {
                echo json_encode(array("error" => "Email уже существует"));
                die;
            }

            $data = array(
                "login" => $login,
                "role" => 2,
                "password" => md5($password),
                "name" => $name,
                "email" => $email
            );

            if ($id = $this->model->registration($data)) {
                $data['users_id'] = $id;
                User::login($data);
                echo json_encode(array('error' => ""));
            } else
                echo json_encode(array('error' => 'Ошибка!'));
        } else
            echo json_encode(array("error" => "Пароли не совпадают"));
    }

    public function login()
    {
        $data["login"] = htmlspecialchars($_POST['login']);
        $data["password"] = htmlspecialchars($_POST['password']);
        sleep(1);
        if ($this->model->loginExists($data["login"])) {
            if ($user = $this->model->authorization($data)) {
                User::login($user);
                echo json_encode(array("error" => ""));
            } else
                echo json_encode(array("error" => "Неверный пароль"));
        } else
            echo json_encode(array("error" => "Логин не существует"));
    }

    public function logout()
    {
        User::logout();
        header('Location:' . MAIN_PREFIX . '/');
    }
}
