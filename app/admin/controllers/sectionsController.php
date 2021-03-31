<?php

class SectionsController extends Controller
{
    public function __construct($prefix)
    {
        parent::__construct($prefix);

        $this->view->setTitle("Категории");
    }

    public function index()
    {
        if ($sections = $this->model->getList('sections'))
            $this->view->arResult["ITEMS"] = $sections;
        else
            $this->view->arResult["ITEMS"] = array();

        parent::index();
    }

    public function add()
    {
        $data = array(
            'name' => htmlspecialchars($_POST["section_name"]),
            'code' => htmlspecialchars($_POST["section_code"]),
            'parent_id' => htmlspecialchars($_POST["parent_section"]) == 0 ? null : htmlspecialchars($_POST["parent_section"]),
            'depth_level' => is_null($_POST["depth_level"]) ? 0 : htmlspecialchars($_POST["depth_level"])
        );

        if (strlen($data['name']) >= 2 && strlen($data['code']) >= 2)
            if ($id = $this->model->add($data))
                echo json_encode(array("error" => false));
            else
                echo json_encode(array("error" => true));
        else
            echo json_encode(array("error" => true));
    }
}
