<?php

use Libs\User;

require_once __DIR__ . '/../app/libs/Bootstrap.php';

if (User::isLogin() && User::isAdmin())
    $app = new App('/admin/');
else
    header("location: " . MAIN_PREFIX . "/");
