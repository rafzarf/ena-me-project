<?php

namespace App\Controllers;
use App\Models\KomponenModel;
use App\Models\MesinModel;
use App\Models\SpkModel;
use App\Models\ProsesModel;

class Proses extends BaseController
{
    protected $spk;
    protected $proses;
    protected $komponen;
    protected $validation;
    protected $mesin;

    public function __construct() {
        $this->spk = new SpkModel();
        $this->proses = new ProsesModel();
        $this->komponen = new KomponenModel();
        $this->mesin = new MesinModel();
        $this->validation = \Config\Services::validation();
    }

    public function index($id) {
        $keyword = $this->request->getVar('keyword') ? $this->request->getVar('keyword') : "";
        $currentPage = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        $perPage = $this->request->getVar('entries') ? $this->request->getVar('entries') : 5;
        $getSPK = $this->spk->getSPKDetail($id);
        $no_spk = $getSPK[0]->no_spk;
        $getKomponenOptions = $this->komponen->getKomponenOptions($no_spk);
        $getKomponen = array_column($getKomponenOptions, 'nama_komponen');
        $data = [
            'title' => 'Proses',
            'nav_active' => 2,
            'getSPK' => $getSPK,
            'DataMesin' => $this->mesin->getDataMesin(),
            'getKomponen' =>  $getKomponen,
            'getProses' => $this->proses->search($keyword,$id)->paginate($perPage),
            'pager' => $this->proses->pager,
            'current_page' => $currentPage,
            'entries' => $perPage
        ];

        return view("pages/proses.php", $data);
    }

    public function createKomponen() {
        $this->validation->setRules([
            'nama_komponen' => [
                'label' => 'Nama Komponen',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Komponen wajib diisi',
                ]
            ],
            'no_spk' => [
                'label' => 'Nomor SPK',
                'rules' => 'required',
                'errors' => [
                    'required' => 'No SPK wajib diisi',
                ]
            ],
        ]); 
        $isDataValid = $this->validation->withRequest($this->request)->run(); 
        if($isDataValid){
            $this->komponen->insert([
                'nama_komponen' => $this->request->getPost('nama_komponen'),
                'no_spk' => $this->request->getPost('no_spk'),
            ]); 
            $data = ['success' => true];
            return $this->response->setJSON($data);
        } else {
            return $this->response->setJSON($this->validation->getErrors()); 
        }
    }
    public function createProses() {
        $this->validation->setRules([
            'nama_mesin' => [
                'label' => 'Nama Mesin',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Permesinan wajib diisi',
                ]
            ],
            'nama_komponen' => [
                'label' => 'Nomor SPK',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Komponen wajib diisi',
                ]
            ],
            'durasi_waktu' => [
                'label' => 'Durasi Waktu',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Waktu wajib diisi',
                ]
            ],
            'id_spk' => [
                'label' => 'Id SPK',
                'rules' => 'required',
                'errors' => [
                    'required' => 'SPK wajib diisi',
                ]
            ],
        ]); 
        $isDataValid = $this->validation->withRequest($this->request)->run(); 
        if($isDataValid){
            $this->proses->insert([
                'nama_mesin' => $this->request->getPost('nama_mesin'),
                'nama_komponen' => $this->request->getPost('nama_komponen'),
                'durasi_waktu' => $this->request->getPost('durasi_waktu'),
                'id_spk' => $this->request->getPost('id_spk'),
            ]); 
            $data = ['success' => true];
            return $this->response->setJSON($data);
        } else {
            return $this->response->setJSON($this->validation->getErrors()); 
        }
    }
    public function deleteProses($id) {
        $this->proses->delete($id);
        session()->setFlashdata('del_msg','success');
        return redirect()->back();
    }
    public function editProses() {
        $id = $this->request->getPost('edit_id_proses_start');
        $this->validation->setRules([
            'edit_nama_mesin' => [
                'label' => 'Edit Mesin',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Mesin wajib diisi',
                ]
            ],
            'edit_nama_komponen' => [
                'label' => 'Edit Nama Komponen',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Komponen wajib diisi',
                ]
            ],
            'edit_durasi_waktu' =>  [
                'label' => 'Edit Durasi Kerja',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Unit Kerja wajib diisi',
                ]
            ],
        ]);
        $isDataValid = $this->validation->withRequest($this->request)->run();
        if($isDataValid){
            $this->proses->update($id, [
                'nama_mesin' => $this->request->getPost('edit_nama_mesin'),
                'nama_komponen' => $this->request->getPost('edit_nama_komponen'),
                'durasi_waktu' => $this->request->getPost('edit_durasi_waktu'),
             
            ]);
            $data = ['success' => true];
            return $this->response->setJSON($data);
        } else {
            return $this->response->setJSON($this->validation->getErrors()); 
        }
    }
    public function validateSPK($id){
        // lakukan validasi data spk
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'validation' => 'required',
        ]);

        $isDataValid = $validation->withRequest($this->request)->run();

        // jika data vlid, maka simpan ke database
        if($isDataValid){
            $this->spk->update($id, [
                'gbr_kerja' => $this->request->getPost('validation'),
            ]);

            session()->setFlashdata('validate_msg','success');
            //return redirect('admin/news');
        } else {
            session()->setFlashdata('validate_msg','error');
        }
        // tampilkan form edit
        return redirect()->back()->withInput();
    }
}
