<?php

class CatalogController extends Controller
{
    public function __construct($prefix)
    {
        parent::__construct($prefix);

        $this->view->setTitle("Каталог");

        if ($books = $this->model->getListBooks())
            $this->view->arResult["books"] = $books;
        else
            $this->view->arResult["books"] = array();

    }
    
}


