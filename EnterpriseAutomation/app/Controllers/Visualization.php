<?php

namespace App\Controllers;

class Visualization extends BaseController
{

    public function index() {

        $data = [
            'title' => 'Visualization',
            'nav_active' => 3
        ];

        return view("pages/visualization.php", $data);
    }
    
}
