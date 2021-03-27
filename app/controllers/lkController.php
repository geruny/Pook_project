<?php

class LkController extends Controller {
    public function __construct($prefix) {
        parent::__construct($prefix);

        $this->view->setTitle("Личный кабинет");
    }
}
