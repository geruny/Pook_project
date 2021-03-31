<?php

class SectionsController extends Controller
{
    public function __construct($prefix)
    {
        parent::__construct($prefix);

        $this->view->setTitle("Категории");

    }
}