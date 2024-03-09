<?php

namespace App\Controllers;

class Dashboard extends BaseController
{

    public function index() {

        $data = [
            'title' => 'Dashboard',
            'nav_active' => 1
        ];

        return view("pages/dashboard", $data);
    }
    
}
