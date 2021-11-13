<?php

namespace App\Controllers;

use App\Core\Request;

/**
 * @author  Muhammed Sami
 * @package App\Controllers
 */
class AuthController extends BaseController
{
    public function login()
    {
        return $this->render('login');
    }

    public function register(Request $request)
    {
        $this->setLayout('auth');

        if ($request->isPost()) {
            return 'Handle data';
        }

        return $this->render('register');
    }
}
