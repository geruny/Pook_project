<?php

namespace Libs;

class Files{

    private $d_path = __DIR__ . '/../../upload/';

    static function uploadFile($file,$path)
    {
        $file_info=pathinfo($file['name']);
    }


}