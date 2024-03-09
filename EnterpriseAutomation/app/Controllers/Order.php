<?php

namespace App\Controllers;

class Order extends BaseController
{

    public function index() {

        $data = [
            'title' => 'Order',
            'nav_active' => 2
        ];

        return view("pages/order.php", $data);
    }
    
}
