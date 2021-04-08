<?php

use Libs\Files;

include_once 'sectionsController.php';

class ProductsController extends Controller
{
    public function __construct($prefix)
    {
        parent::__construct($prefix);

        $this->view->setTitle("Архив");

        $sections = $this->model->getList('genres');

        $this->view->sections = $sections;
    }

    public function add()
    {
        $data = array();
        $errors = array();

        if (count($_POST) > 0) {
            foreach ($_POST as $key => $rd) {
                $data[htmlspecialchars($key)] = htmlspecialchars($rd);
            }
        }

        if (strlen($data['product_title']) < 1)
            $errors['title'] = 'short';

        if (isset($_FILES['product_img'])) {
            $data['product_img'] = Files::uploadFile($_FILES['product_img'], get_class($this));
        }

        if (count($errors) == 0) {
            $addData = array(
                'title' => $data['product_title'],
                'date' => $data['product_date'],
                'description' => $data['product_description'],
                'genres_id' => $data['genres_id'],
                'writers_id' => $data['writers_id'],
                'img' => $data['product_img'],
                'active' => is_null($data['product_active']) ? 'N' : 'Y'
            );

            if ($id = $this->model->add($addData))
                echo json_encode(array("error" => false));
            else
                echo json_encode(array("error" => true));
        } else
            echo json_encode(array('errors' => $errors));
    }
}
