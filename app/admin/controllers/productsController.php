<?php

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
        $data=array();
        $errors=array();

        if(count($_POST)>0){
            foreach ($_POST as $key => $rd) {
                $data[htmlspecialchars($key)]=htmlspecialchars($rd);
            }
        }

        if(strlen($data['product_title'])<1)
        $errors['title']='short';

        if(count($errors)==0){
        $addData=array(
            'title'=>$data['product_title'],
            'date'=> $data['product_date'],
            'description'=> $data['product_description'],
            'genres_id'=> $data['genres_id'],
            'writers_id'=> $data['writers_id'],
            'pic'=> $data['product_title'],
            'active'=>is_null($data['product_active'])?'N':'Y'
        );
        }else
        echo json_encode(array('errors'=>$errors));
    }
}
