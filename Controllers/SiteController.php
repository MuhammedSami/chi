<?php

namespace App\Controllers;

use App\Core\Application;

/**
 * @author  Muhammed Sami
 * @package App\Controllers
 */
class SiteController extends BaseController
{
    public function contact()
    {
        $params = [
            'name' => 'Chi Framework!'
        ];

        return $this->render('contact', $params);
    }

    public function handleContact()
    {
        var_dump($_POST);
        return "Handling...";
    }
}
