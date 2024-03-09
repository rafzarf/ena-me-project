<?php

namespace App\Controllers;

class Gudang extends BaseController
{

    public function index() {

        $data = [
            'title' => 'Gudang',
            'nav_active' => 5
        ];

        return view("pages/gudang.php", $data);
    }
    
}
