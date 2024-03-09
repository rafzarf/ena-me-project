<?php

namespace App\Controllers;

class Permesinan extends BaseController
{

    public function index() {

        $data = [
            'title' => 'Permesinan',
            'nav_active' => 4
        ];

        return view("pages/permesinan.php", $data);
    }
    
}
