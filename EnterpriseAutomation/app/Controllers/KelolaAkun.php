<?php

namespace App\Controllers;
use App\Models\AkunModel;

class KelolaAkun extends BaseController{

    protected $akun;
    protected $validation;

    public function __construct() {
        $this->akun = new AkunModel();
        $this->validation = \Config\Services::validation();
    }

    public function index() {
        $keyword = $this->request->getVar('keyword') ? $this->request->getVar('keyword') : "";
        $currentPage = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        $perPage = $this->request->getVar('entries') ? $this->request->getVar('entries') : 5;

        $data = [
            'title' => 'Kelola Akun',
            'nav_active' => 6,
            'getAkun' => $this->akun->search($keyword)->paginate($perPage),
            'pager' => $this->akun->pager,
            'current_page' => $currentPage,
            'entries' => $perPage,
        ];
        return view("/pages/kelola-akun", $data);
    }

    //METHOD DELETE & MULTI DELETE
    //buat delete gapake AJAX karena gapenting juga , jadi keep kaya gini aja
	public function deleteAkun($id){
        $this->akun->delete($id);
        session()->setFlashdata('del_msg','success');
        return redirect()->back();
    }

    public function bulkDelAkun($id){
        $arrIds = explode(",", $id);
        $this->akun->multipleDelete($arrIds);
        session()->setFlashdata('del_msg','success');
        return redirect()->back();
    }

    // METHOD CREATE
    public function createAkun(){
        $this->validation->setRules([
            'Username' => [
                'label' => 'Username',
                'rules' => 'required|is_unique[worker.Username]',
                'errors'=> [
                    'required' => 'Username wajib diisi',
                    'is_unique' => 'Username sudah ada'
                ]
            ],
            
            'Name' => [
                'label' => 'Name',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama wajib diisi',
                ]
            ],

            'Password' => [
                'label' => 'Password',
                'rules' => 'required|matches[ConfirmPassword]|min_length[8]|max_length[25]|alpha_dash|check_strong_password',
                'errors' => [
                    'required' => 'Password wajib diisi',
                    'matches' => 'Password harus sama dengan Konfirmasi Password',
                    'min_length' => 'Password minimal terdiri dari 8 karakter',
                    'max_length' => 'Password maksimal terdiri dari 25 karakter',
                    'check_strong_password' => 'Password harus terdiri dari kombinsi angka dan alfabet',
                ]
            ] ,
            'ConfirmPassword' => [
                'label' => 'Confirmation Password',
                'rules' => 'required|matches[Password]',
                'errors' => [
                    'required' => 'Konfirmasi Password wajib diisi',
                    'matches' => 'Konfirmasi Password harus sama dengan Password',
                ],
            'Role' => 'permit_empty',
        ]
    ]);
        $isDataValid = $this->validation->withRequest($this->request)->run();
        if($isDataValid){
            $this->akun->insert([
                "Username" => $this->request->getPost('Username'),
                "Name" => ucwords(strtolower((string)$this->request->getPost('Name'))),
                "Password" => password_hash((string)$this->request->getPost('Password'), PASSWORD_DEFAULT),
                'Role' => ucwords(strtolower((string)$this->request->getPost('Role'))),
            ]);

            //REDIRECT PAGE DENGAN LOGIC FRONTEND, PAKE AJAX, SENT RESPONSE BUAT BISA RELOAD DI JS
            $data = ['success' => true];
            return $this->response->setJSON($data);
        } else {
            return $this->response->setJSON($this->validation->getErrors()); 
        }
    }

     // METHOD EDIT
    public function editInfo(){
        $id = $this->request->getPost('id_worker');
        $this->validation->setRules([
            'Username_edit' => [
                'label' => 'Username',
                'rules' => 'required|is_unique[worker.Username]',
                'errors'=> [
                    'required' => 'Username wajib diisi',
                    'is_unique' => 'Username sudah ada'
                ]
            ],
            
            'Name_edit' => [
                'label' => 'Name',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama wajib diisi',
                ]
            ],
    ]);
        $isDataValid = $this->validation->withRequest($this->request)->run();
        if($isDataValid){
            $this->akun->update($id, [
                "Username" => $this->request->getPost('Username_edit'),
                "Name" => ucwords(strtolower((string)$this->request->getPost('Name_edit'))),
            ]);

            //REDIRECT PAGE DENGAN LOGIC FRONTEND, PAKE AJAX, SENT RESPONSE BUAT BISA RELOAD DI JS
            $data = ['success' => true];
            return $this->response->setJSON($data);
        } else {
            return $this->response->setJSON($this->validation->getErrors()); 
        }
    }

    
     // METHOD EDIT
    public function editRole(){
        $id = $this->request->getPost('id_worker_role');
        $this->validation->setRules([
            'Role_edit' => 'permit_empty',
    ]);
        $isDataValid = $this->validation->withRequest($this->request)->run();
        if($isDataValid){
            $this->akun->update($id, [
                'Role' => ucwords(strtolower((string)$this->request->getPost('Role_edit'))),
            ]);

            //REDIRECT PAGE DENGAN LOGIC FRONTEND, PAKE AJAX, SENT RESPONSE BUAT BISA RELOAD DI JS
            $data = ['success' => true];
            return $this->response->setJSON($data);
        } else {
            return $this->response->setJSON($this->validation->getErrors()); 
        }
    }

    
     // METHOD EDIT
    public function editPassword(){
        $id = $this->request->getPost('id_worker_pass');
        $this->validation->setRules([
            'Password_edit' => [
                'label' => 'Password_edit',
                'rules' => 'required|matches[ConfirmPassword_edit]|min_length[8]|max_length[25]|alpha_dash|check_strong_password',
                'errors' => [
                    'required' => 'Password wajib diisi',
                    'matches' => 'Password harus sama dengan Konfirmasi Password',
                    'min_length' => 'Password minimal terdiri dari 8 karakter',
                    'max_length' => 'Password maksimal terdiri dari 25 karakter',
                    'check_strong_password' => 'Password harus terdiri dari kombinsi angka dan alfabet',
                ]
            ] ,
            'ConfirmPassword_edit' => [
                'label' => 'Confirmation Password_edit',
                'rules' => 'required|matches[Password_edit]',
                'errors' => [
                    'required' => 'Konfirmasi Password wajib diisi',
                    'matches' => 'Konfirmasi Password harus sama dengan Password',
                ],
        ]
    ]);
        $isDataValid = $this->validation->withRequest($this->request)->run();
        if($isDataValid){
            $this->akun->update($id, [
                "Password" => password_hash((string)$this->request->getPost('Password_edit'), PASSWORD_DEFAULT),
            ]);

            //REDIRECT PAGE DENGAN LOGIC FRONTEND, PAKE AJAX, SENT RESPONSE BUAT BISA RELOAD DI JS
            $data = ['success' => true];
            return $this->response->setJSON($data);
        } else {
            return $this->response->setJSON($this->validation->getErrors()); 
        }
    }
    
}