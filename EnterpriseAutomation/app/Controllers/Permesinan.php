<?php

namespace App\Controllers;
use App\Models\MesinModel;
use App\Models\PengerjaanModel;
use App\Models\ProsesModel;
use App\Models\SpkModel;

class Permesinan extends BaseController
{
    protected $akun;
    protected $spk;
    protected $mesin;
    protected $proses;
    protected $pengerjaan;
    protected $validation;
    protected $datenow;
    
    public function __construct() {
        $this->proses = new ProsesModel();
        $this->mesin = new MesinModel();
        $this->spk = new SpkModel();
        $this->datenow = new \DateTime('now', new \DateTimeZone('Asia/Jakarta'));
        $this->pengerjaan = new PengerjaanModel();
        $this->validation = \Config\Services::validation();
    }

    //METHOD INDEX (HALAMAN DEFAULT)
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
    
    //METHOD LIST SPK BERDASARKAN NAMA MESIN
    public function listspk($mesin) {
        $keyword = $this->request->getVar('keyword') ? $this->request->getVar('keyword') : "";
        $currentPage = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        $perPage = $this->request->getVar('entries') ? $this->request->getVar('entries') : 9;

        $data = [
            'title' => 'Pengerjaan',
            'nav_active' => 4,
            'datamesin' => $mesin,
            'dataLoad' => $this->pengerjaan->getLoadMachine($mesin),
            'dataAll' => $this->pengerjaan->findAll(),
            'dataspk' => $this->pengerjaan->returnSPK($mesin , $keyword)->paginate($perPage),
            'pager' => $this->pengerjaan->pager,
            'current_page' => $currentPage,
            'entries' => $perPage,
        ];

        return view("pages/pengerjaan.php", $data);
    }

    //METHOD LIST SPK BERDASARKAN NAMA MESIN
    public function operator($mesin, $no_spk) {
        $keyword = $this->request->getVar('keyword') ? $this->request->getVar('keyword') : "";
        $currentPage = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        $perPage = $this->request->getVar('entries') ? $this->request->getVar('entries') : 6;
        $data = [
            'title' => 'Operator Permesinan',
            'nav_active' => 4,
            'mesin' => $mesin,
            'no_spk' => $no_spk,
            'getPengerjaan' => $this->pengerjaan->getDatabyMesinSPK($mesin, $no_spk, $keyword)->paginate($perPage),
            'pager' => $this->pengerjaan->pager,
            'current_page' => $currentPage,
            'entries' => $perPage,
        ];

        return view("pages/operator.php", $data);
    }
    
    public function StartMachining() {
        $id_pengerjaan = $this->request->getPost('id_start');
        $id_proses = $this->request->getPost('id_proses_start');
        $status = $this->request->getPost('status');
        $no_spk = $this->request->getPost('no_spk');

        $id_no_spk = $this->spk->getID($no_spk);
        $id_spk = $id_no_spk[0]->id_spk;

        $this->pengerjaan->update($id_pengerjaan, [
            'tgl_mulai' => $this->datenow->format('Y-m-d H:i:s'),
            'status' => ucwords(strtolower((string)$status)),
        ]);

        $this->proses->update($id_proses, [
            'status' => ucwords(strtolower((string)$status)),
        ]);

        $this->spk->update($id_spk, [
            'status' => ucwords(strtolower((string)$status)),
        ]);

        session()->setFlashdata('start_msg','success');
        return redirect()->back();
    }

    public function StopMachining() {
        $id_pengerjaan = $this->request->getPost('id_stop');
        $id_proses = $this->request->getPost('id_proses_stop');
        $status = $this->request->getPost('status');
        $mesin = $this->request->getPost('nama_mesin');
        $start = $this->pengerjaan->getStartHour($id_proses);
        $startHour = $start[0]->tgl_mulai;

        $datetime1 = new \DateTime((string)$startHour);
        $datetime2 = new \DateTime((string)$this->datenow->format('Y-m-d H:i:s'));
        $difference = $datetime1->diff($datetime2); 
        $timestr = $difference->format('%h:%i:%s'); 
        $parts = explode(':', $timestr);
        $seconds = ($parts[0] * 60 * 60) + ($parts[1] * 60) + $parts[2];
        $hour = $seconds / 3600;

        $dataHour = [
            'total_jam' => $hour,
        ];

        $this->mesin->saveHour($mesin, $dataHour);

        $this->pengerjaan->update($id_pengerjaan, [
            'tgl_selesai' => $this->datenow->format('Y-m-d H:i:s'),
            'status' => ucwords(strtolower((string)$status)),
        ]);

        $this->proses->update($id_proses, [
            'status' => ucwords(strtolower((string)$status)),
        ]);
        
        session()->setFlashdata('stop_msg','success');
        return redirect()->back();
    }

    public function SaveWorker() {
        $id_pengerjaan = $this->request->getPost('id_pengerjaan');
        $pelaksana = $this->request->getPost('name');

        $this->pengerjaan->update($id_pengerjaan, [
            'pelaksana' => ucwords(strtolower((string)$pelaksana)),
        ]);
        session()->setFlashdata('worker_msg','success');
        return redirect()->back();
    }


}