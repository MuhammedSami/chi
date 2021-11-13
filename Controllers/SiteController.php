<?php

namespace App\Controllers;

use App\Core\Application;
use App\Core\Request;

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

    public function handleContact(Request $request)
    {

        return "Handling...";
    }
}
