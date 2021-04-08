<?php

namespace Libs;

class Files
{
    const d_path = __DIR__ . '/../../upload/';
    const extension = array("jpg", "jpeg", "png");

    static function uploadFile($file, $path)
    {
        $file_info = pathinfo($file['filename']);

        if (in_array($file_info['extension'], self::extension)) {

            if ($file['size'] <= MAX_UPLOAD_SIZE) {

                $dir = self::d_path . $path;

                if (!file_exists($dir)) {
                    mkdir($dir);
                }

                $new_name = md5($file_info['filename'] . rand(9999, 99999)) . "." . $file_info['extension'];

                while (file_exists($dir . '/' . $new_name)) {
                    $new_name = md5($file_info['filename'] . rand(999, 99999)) . "." . $file_info['extension'];
                }

                if (move_uploaded_file($file['tmp_name'], $dir . '/' . $new_name)) {
                    return $path . '/' . $new_name;
                } else
                    return false;
            } else
                return false;
        } else
            return false;
    }
}
