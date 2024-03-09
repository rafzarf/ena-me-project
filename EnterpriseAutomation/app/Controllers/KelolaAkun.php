<?php

namespace App\Controllers;

class KelolaAkun extends BaseController
{
    public function index() {
        $data = [
            'title' => 'Kelola Akun',
            'nav_active' => 3
        ];


        return view("/pages/kelola-akun", $data);
    }


    
}
