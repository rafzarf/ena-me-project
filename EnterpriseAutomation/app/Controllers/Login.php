<?php

namespace App\Controllers;

class Login extends BaseController
{

    public function index() {

        $data = [
            'title' => 'Login',
            'nav_active' => 1
        ];

        return view("pages/login.php", $data);
    }
    
}
