<?php

namespace App\Controllers;
use App\Models\MesinModel;

class Permesinan extends BaseController
{

    protected $mesin;
    protected $validation;

    public function __construct() {
        $this->mesin = new MesinModel();
        $this->validation = \Config\Services::validation();
    }

    public function index() {
        $data = [
            'title' => 'Permesinan',
            'nav_active' => 4,
            'DataMesin' => $this->mesin->getDataMesin(),
        ];
        return view("pages/permesinan.php", $data);
    }

    //METHOD CREATE MESIN
    public function createMesin() {
        $this->validation->setRules([
            'nama_mesin' => [
                'label' => 'Nama Mesin',
                'rules' => 'required|is_unique[mesin.nama_mesin]',
                'errors' => [
                    'required' => 'Nama Mesin wajib diisi',
                    'is_unique' => 'Nama Mesin sudah ada',
                ]
            ],

            'gambar_mesin' => [
                'label' => 'Gambar Mesin',
                'rules' => 'max_size[gambar_mesin,1024]|is_image[gambar_mesin]|mime_in[gambar_mesin,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran Gambar tidak boleh lebih besar dari 1MB',
                    'is_image' => 'File tidak valid. File bukan merupakan File img / gambar',
                    'mime_in' => 'Format file tidak valid. File harus berformat .jpg, .jpeg, dan .png,',
                ]
            ],
        ]);
        $isDataValid = $this->validation->withRequest($this->request)->run();
        if($isDataValid){
            $getGambar = $this->request->getFile('gambar_mesin');
            $getGambar->move('assets/img');
            $this->mesin->insert([
                "nama_mesin" => ucwords(strtolower((string)$this->request->getPost('nama_mesin'))),
                "gambar_mesin" => $getGambar->getName(),
            ]);
            $data = ['success' => true];
            return $this->response->setJSON($data);
        } else {
            return $this->response->setJSON($this->validation->getErrors()); 
        }

    }

    //METHOD CREATE NO_MESIN
    public function createTypeMesin() {
        $this->validation->setRules([
            'nama_mesin_select' => [
                'label' => 'Nama Mesin',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Mesin wajib diisi',
                ]
            ],
            'no_mesin' => [
                'label' => 'Nomor Mesin',
                'rules' => 'required|is_unique[mesin.no_mesin]',
                'errors' => [
                    'required' => 'Nomor / Tipe Mesin wajib diisi',
                    'is_unique' => 'Nomor / Tipe Mesin sudah ada',
                ]
            ],
        ]);
        $isDataValid = $this->validation->withRequest($this->request)->run();
        if($isDataValid){
            $this->mesin->insert([
                "nama_mesin" => ucwords(strtolower((string)$this->request->getPost('nama_mesin_select'))),
                "no_mesin" => ucwords(strtolower((string)$this->request->getPost('no_mesin'))),
            ]);
            $data = ['success' => true];
            return $this->response->setJSON($data);
        } else {
            return $this->response->setJSON($this->validation->getErrors()); 
        }
    }

    // METHOD EDIT / UPDATE
    public function editMesin() {
        $id = $this->request->getPost('edit_id_mesin');
        $this->validation->setRules([
            'edit_id_mesin' => [
                'label' => 'Edit ID Mesin',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Mesin wajib diisi',
                ]
            ],
            'edit_nama_mesin' => [
                'label' => 'Edit Nama Mesin',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Mesin wajib diisi',
                ]
            ],
            'edit_gambar_mesin' => [
                'label' => 'Edit Gambar Mesin',
                'rules' => 'max_size[edit_gambar_mesin,1024]|is_image[edit_gambar_mesin]|mime_in[edit_gambar_mesin,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran Gambar tidak boleh lebih besar dari 1MB',
                    'is_image' => 'File tidak valid. File bukan merupakan File img / gambar',
                    'mime_in' => 'Format file tidak valid. File harus berformat .jpg, .jpeg, dan .png,',
                ]
            ],
        ]);
        $isDataValid = $this->validation->withRequest($this->request)->run();
        if($isDataValid){
            $getEditGambar = $this->request->getFile('edit_gambar_mesin');
            $getEditGambar->move('assets/img');
            $this->mesin->update($id, [
                "nama_mesin" => ucwords(strtolower((string)$this->request->getPost('edit_nama_mesin'))),
                "gambar_mesin" => $getEditGambar->getName(),
            ]);
            $data = ['success' => true];
            return $this->response->setJSON($data);
        } else {
            return $this->response->setJSON($this->validation->getErrors()); 
        }
    }

    // METHOD DELETE
	public function deleteMesin($id){
        $this->mesin->delete($id);
        session()->setFlashdata('del_msg','success');
        return redirect()->back();
    }

    
}
