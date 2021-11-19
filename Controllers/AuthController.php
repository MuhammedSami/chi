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
        $this->setLayout('auth');

        if ($request->isPost()) {
            $registerEntry = new RegisterModel();
            $registerEntry->loadData($request->getBody());

            if ($registerEntry->validate() && $registerEntry->register()){
                return 'success';
            }


            return 'Handle data';
        }

        return $this->render('register');
    }
}
