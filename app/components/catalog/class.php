<?php

namespace Components;
use Libs\App;

class Catalog extends \Libs\Components{

    public function executComponent()
    {
        if(App::getController('sections')){
            
        }
        $this->includeTemplate();
    }
}