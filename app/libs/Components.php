<?php

namespace Libs;

class Components
{
    public $params;

    public function __construct($name, $template, $param)
    {
        $this->params['COMPONENT_NAME'] = $name;
        $this->params['COMPONENT_TEMPLATE'] = $template;
        $this->params = array_merge($param,$this->params);
    }

    public function executComponent()
    {
    }

    public function includeTemplate($name = 'default')
    {
        $template_path = __DIR__ . '/../components/'.$this->params['COMPONENT_NAME'].'/templates/' . $name . '/template.php';
        
        if (file_exists($template_path)) {
            require $template_path;
        } else
            \Libs\App::showError("Template $name dose not exists");
    }
}
