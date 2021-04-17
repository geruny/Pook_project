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

    public static function getList()
    {
    }

    // public static function getInstance()
    // {
    //     $instance = null;

    //     if (!empty(self::$instance) && self::$instance instanceof SectionsController) {
    //         $instance = self::$instance;
    //     } else {
    //         $instance = new SectionsController();
    //     }

    //     return $instance;
    // }
}
