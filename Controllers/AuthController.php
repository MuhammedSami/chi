<?php

namespace App\Controllers;

use App\Core\Request;
use App\Models\RegisterModel;

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
        $registerEntry = new RegisterModel();

        if ($request->isPost()) {
            $registerEntry->loadData($request->getBody());

            if ($registerEntry->validate() && $registerEntry->register()) {
                return 'success';
            }

            return $this->render('register', ['model' => $registerEntry]);
        }
        $this->setLayout('auth');
        return $this->render('register', ['model' => $registerEntry]);
    }
}
