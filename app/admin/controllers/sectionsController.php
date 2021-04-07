<?php

class SectionsController extends Controller
{

    private static $instance;

    public function __construct($prefix)
    {
        parent::__construct($prefix);

        $this->view->setTitle("Категории");
    }

    public function index()
    {
        if ($sections = $this->model->getList('genres'))
            $this->view->arResult["ITEMS"] = $sections;
        else
            $this->view->arResult["ITEMS"] = array();

        parent::index();
    }

    public function add()
    {
        $data = array(
            'name' => htmlspecialchars($_POST["section_name"]),
        );

        if (strlen($data['name']) >= 2)
            if ($id = $this->model->add($data))
                echo json_encode(array("error" => false));
            else
                echo json_encode(array("error" => true));
        else
            echo json_encode(array("error" => true));
    }

    public function del()
    {
        $data = array(
            "id" => htmlspecialchars((int)$_POST["id"])
        );

        if ($data["id"] > 0) {
            if ($this->model->delete("genres", "genres_id", $data["id"]))
                echo json_encode(array("success" => true));
            else
                echo json_encode(array("success" => false));
        }
    }

    public function getById($id)
    {
        $this->model->getById($id);
    }

    public static function getInstance()
    {
        $instance = null;

        if (!empty(self::$instance) && self::$instance instanceof SectionsController) {
            $instance = self::$instance;
        } else {
            $instance = new SectionsController();
        }

        return $instance;
    }
}
