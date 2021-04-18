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
        parent::index();
    }

  
}
