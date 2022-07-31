<?php

namespace App\Controller;

use App\Config\Database;
use App\Lib\Render;

class InfoController
{

    public static function showAction()
    {
        $content = Render::renderContent("index-info");
        return Render::renderLayout($content,"index");
    }
}