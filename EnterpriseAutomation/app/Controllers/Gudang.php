<?php

namespace App\Controllers;
use App\Models\SpkModel;
use App\Models\LogistikModel;

class Gudang extends BaseController
{

    protected $spk;
    protected $logistik;
    protected $validation;

    public function __construct() {
        $this->spk = new SpkModel();
        $this->logistik = new LogistikModel();
        $this->validation = \Config\Services::validation();
    }

    
    public function index() {

        $keyword = $this->request->getVar('keyword') ? $this->request->getVar('keyword') : "";
        $currentPage = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        $perPage = $this->request->getVar('entries') ? $this->request->getVar('entries') : 5;
        
        $data = [
            'title' => 'Gudang',
            'nav_active' => 5,
            'getLogistik' => $this->logistik->search($keyword)->paginate($perPage),
            'getSPKNumber' => $this->spk->getUniqueKeySPK(),
            'pager' => $this->logistik->pager,
            'current_page' => $currentPage,
            'entries' => $perPage,
        ];
        return view("pages/gudang.php", $data);
    }

    public function createLogistik() {
        $this->validation->setRules([
            'nama_barang'=> [
                'label' => 'Nama Barang',
                'rules' => 'required',
                'errors'=> [
                    'required' => 'Nama Barang wajib diisi',
                ]
            ],
            'no_spk' => [
                'label' => 'Nomor SPK',
                'rules' => 'required',
                'errors'=> [
                    'required' => 'Nomor SPK wajib diisi',
                ]
            ],
            'batas_waktu' => [
                'label' => 'Batas Waktu',
                'rules' => 'required',
                'errors'=> [
                    'required' => 'Batas Waktu wajib diisi',
                ]
            ],
            'nama_penerima' => [
                'label' => 'Nama Penerima',
                'rules' => 'required',
                'errors'=> [
                    'required' => 'Nama Penerima wajib diisi',
                ]
            ],
            'tempat_simpan' =>[
                'label' => 'Lokasi Penyimpanan',
                'rules' => 'required',
                'errors'=> [
                    'required' => 'Lokasi Penyimpanan wajib diisi',
                ]
            ],
            'jml_komponen' => [
                'label' => 'Jumlah',
                'rules' => 'required|decimal',
                'errors'=> [
                    'required' => 'Jumlah wajib diisi',
                ]
            ],
        ]);
        $isDataValid = $this->validation->withRequest($this->request)->run();
        if($isDataValid){
            $this->logistik->insert([
                "no_spk" => $this->request->getPost('no_spk'),
                "nama_penerima" => ucwords(strtolower((string)$this->request->getPost('nama_penerima'))),
                "status" => ucwords(strtolower((string)$this->request->getPost('status'))),
                'batas_waktu' => $this->request->getPost('batas_waktu'),
                'nama_barang' => ucwords(strtolower((string)$this->request->getPost('nama_barang'))),
                'tempat_simpan' => ucwords(strtolower((string)$this->request->getPost('tempat_simpan'))),
                'jml_komponen' => $this->request->getPost('jml_komponen'),
            ]);
            $data = ['success' => true];
            return $this->response->setJSON($data);
        } else {
            return $this->response->setJSON($this->validation->getErrors()); 
        }
    }

    public function editLogistik(){
        $id = $this->request->getPost('idlogistik');
        $this->validation->setRules([
            'idlogistik' => [
                'label' => 'Id Logistik',
                'rules' => 'required',
                'errors'=> [
                    'required' => 'Wajib diisi',
                ]
            ],
            'edit_nama_barang' => [
                'label' => 'Edit Nama Barang',
                'rules' => 'required',
                'errors'=> [
                    'required' => 'Nama Barang wajib diisi',
                ]
            ],
            'edit_batas_waktu' => [
                'label' => 'Edit Batas Waktu',
                'rules' => 'required',
                'errors'=> [
                    'required' => 'Batas Waktu wajib diisi',
                ]
            ],
            'edit_nama_penerima' => [
                'label' => 'Edit Nama Penerima',
                'rules' => 'required',
                'errors'=> [
                    'required' => 'Nama Penerima wajib diisi',
                ]
            ],
            'edit_tempat_simpan' => [
                'label' => 'Edit Lokasi Penyimpanan',
                'rules' => 'required',
                'errors'=> [
                    'required' => 'Lokasi Penyimpanan wajib diisi',
                ]
            ],
            'edit_jml_komponen' => [
                'label' => 'Edit Jumlah Komponen',
                'rules' => 'required|decimal',
                'errors'=> [
                    'required' => 'Jumlah Komponen wajib diisi',
                ]
            ],
            'edit_status' => [
                'label' => 'Edit Status',
                'rules' => 'required',
                'errors'=> [
                    'required' => 'Status Barang wajib diisi',
                ]
            ],
        ]);
        $isDataValid = $this->validation->withRequest($this->request)->run();
        // jika data vlid, maka simpan ke database
        if($isDataValid){
            $this->logistik->update($id, [
                "nama_penerima" => ucwords(strtolower((string)$this->request->getPost('edit_nama_penerima'))),
                "status" => ucwords(strtolower((string)$this->request->getPost('edit_status'))),
                'batas_waktu' => $this->request->getPost('edit_batas_waktu'),
                'nama_barang' => ucwords(strtolower((string)$this->request->getPost('edit_nama_barang'))),
                'tempat_simpan' => ucwords(strtolower((string)$this->request->getPost('edit_tempat_simpan'))),
                'jml_komponen' => $this->request->getPost('edit_jml_komponen'),
            ]);
            $data = ['success' => true];
            return $this->response->setJSON($data);
        } else {
            return $this->response->setJSON($this->validation->getErrors()); 
        }
    }

    // METHOD DELETE & MULTIPLE DELETE
	public function deleteLogistik($id){
        $this->logistik->delete($id);
        session()->setFlashdata('del_msg','success');
        return redirect()->back();
    }

    public function bulkDelGudang($id){
        $arrIds = explode(",", $id);
        $this->logistik->multipleDelete($arrIds);
        session()->setFlashdata('del_msg','success');
        return redirect()->back();
    }
    
}