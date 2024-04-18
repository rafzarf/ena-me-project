<?php

namespace App\Controllers;
use App\Models\AkunModel;

class Login extends BaseController {
    protected $akun;
    protected $validation;
    public function __construct() {
        $this->akun = new AkunModel();
        $this->validation = \Config\Services::validation();
    }

    public function index() {
        $data = [
            'title' => 'Login',
        ];
        return view("pages/login.php", $data);
    }

    public function Auth() {
        $username = $this->request->getPost('Username');
        $password = $this->request->getPost('Password');
        $result = $this->akun->LoginAuth($username, $password);
        if($result){
            $sessionData = [
                'id_worker' => $result[0]->id_worker,
                'Name' => $result[0]->Name,
                'profile_picture' => $result[0]->profile_picture,
                'isLoggedIn' => true,
                "Role" => $result[0]->Role,
            ];
            session()->set($sessionData);
            $data = ['success' => true];
            return $this->response->setJSON($data);
        } else {
            $data = ['success' => false];
            return $this->response->setJSON($data); 
        }
    }

    public function logout() {
        session()->destroy();
        return redirect()->to(base_url('login'));
    }
    
}