<?php

include_once 'sectionsController.php';

class ProductsController extends Controller
{
    public function __construct($prefix)
    {
        parent::__construct($prefix);

        $this->view->setTitle("Архив");

        $sections=$this->model->getList('books');

        $this->view->sections=$sections;

    }

    public function add()
    {
        
    }
}