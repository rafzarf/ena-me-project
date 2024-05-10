<?php

namespace App\Controllers;
use App\Models\KomponenModel;
use App\Models\MesinModel;
use App\Models\SpkModel;
use App\Models\ProsesModel;
use App\Models\PengerjaanModel;

class Proses extends BaseController
{
    protected $spk;
    protected $proses;
    protected $komponen;
    protected $validation;
    protected $mesin;
    protected $pengerjaan;

    public function __construct() {
        $this->spk = new SpkModel();
        $this->proses = new ProsesModel();
        $this->komponen = new KomponenModel();
        $this->mesin = new MesinModel();
        $this->pengerjaan = new PengerjaanModel();
        $this->validation = \Config\Services::validation();
    }

    public function index($id) {
        //VAR SEARCH
        $keyword = $this->request->getVar('keyword') ? $this->request->getVar('keyword') : "";
        $currentPage = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        $perPage = $this->request->getVar('entries') ? $this->request->getVar('entries') : 5;

        //GET KOMPONEN
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
            'getProses' => $this->proses->search($keyword,$no_spk)->paginate($perPage),
            'count' => $this->proses->returnCountAll($no_spk),
            'finishCount' => $this->proses->returnFinishCount($no_spk),
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
                'nama_komponen' => ucwords(strtolower((string)$this->request->getPost('nama_komponen'))),
                'no_spk' => $this->request->getPost('no_spk'),
            ]); 
            $data = ['success' => true];
            return $this->response->setJSON($data);
        } else {
            return $this->response->setJSON($this->validation->getErrors()); 
        }
    }

    public function createProses() {
        $status = "Menunggu";
        $this->validation->setRules([
            'nama_mesin' => [
                'label' => 'Nama Mesin',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Permesinan wajib diisi',
                ]
            ],
            'nama_komponen' => [
                'label' => 'Nama Komponen',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Komponen wajib diisi',
                ]
            ],
            'jml_komponen' => [
                'label' => 'Jumlah Komponen',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jumlah Komponen wajib diisi',
                ]
            ],
            'durasi_waktu' => [
                'label' => 'Durasi Waktu',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Durasi Waktu wajib diisi',
                ]
            ],
            'no_spk' => [
                'label' => 'Nomor SPK',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nomor SPK wajib diisi',
                ]
            ],
            'kode_mesin' => [
                'label' => 'Nomor Mesin',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kode Mesin wajib diisi',
                ]
            ],
        ]); 
        $isDataValid = $this->validation->withRequest($this->request)->run(); 
        if($isDataValid){
            $this->proses->insert([
                'nama_mesin' => ucwords(strtolower((string)$this->request->getPost('nama_mesin'))),
                'no_mesin' => ucwords(strtolower((string)$this->request->getPost('kode_mesin'))),
                'nama_komponen' => ucwords(strtolower((string)$this->request->getPost('nama_komponen'))),
                'durasi_waktu' => $this->request->getPost('durasi_waktu'),
                'no_spk' => $this->request->getPost('no_spk'),
                'jml_komponen' => $this->request->getPost('jml_komponen'),
                'status' => ucwords(strtolower($status)),
            ]);

            $id_proses = $this->proses->getInsertID();
            $this->pengerjaan->insert([
                'id_prosesstart' => $id_proses,
                'nama_mesin' => ucwords(strtolower((string)$this->request->getPost('nama_mesin'))),
                'no_mesin' => ucwords(strtolower((string)$this->request->getPost('kode_mesin'))),
                'nama_komponen' => ucwords(strtolower((string)$this->request->getPost('nama_komponen'))),
                'nama_produk' => ucwords(strtolower((string)$this->request->getPost('nama_produk'))),
                'no_spk' => $this->request->getPost('no_spk'),
                'status' => ucwords(strtolower($status)),
                'jml_barang' => $this->request->getPost('jml_komponen'),
                'wkt_pengerjaan' => $this->request->getPost('durasi_waktu'),
            ]);

            $data = ['success' => true];
            return $this->response->setJSON($data);
        } else {
            return $this->response->setJSON($this->validation->getErrors()); 
        }
    }

    public function editProses() {
        $id = $this->request->getPost('edit_id_proses_start');
        $id2 = $this->pengerjaan->getIDbyProses($id);
        $id_pengerjaan = $id2[0]->id_pengerjaan;
        $this->validation->setRules([
            'edit_nama_mesin' => [
                'label' => 'Edit Mesin',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Permesinan wajib diisi',
                ]
            ],
            'edit_nama_komponen' => [
                'label' => 'Edit Nama Komponen',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Komponen wajib diisi',
                ]
            ],
            'edit_jml_komponen' => [
                'label' => 'Edit Jumlah Komponen',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jumlah Komponen wajib diisi',
                ]
            ],
            'edit_durasi_waktu' =>  [
                'label' => 'Edit Durasi Kerja',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Durasi Waktu wajib diisi',
                ]
            ],
            'edit_kode_mesin' =>  [
                'label' => 'Edit Kode Mesin',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kode Mesin wajib diisi',
                ]
            ],
        ]);
        $isDataValid = $this->validation->withRequest($this->request)->run();
        if($isDataValid){
            $this->proses->update($id, [
                'nama_mesin' => ucwords(strtolower((string)$this->request->getPost('edit_nama_mesin'))),
                'no_mesin' => ucwords(strtolower((string)$this->request->getPost('edit_kode_mesin'))),
                'nama_komponen' => ucwords(strtolower((string)$this->request->getPost('edit_nama_komponen'))),
                'durasi_waktu' => $this->request->getPost('edit_durasi_waktu'),
                'jml_komponen' => $this->request->getPost('edit_jml_komponen'),
            ]);

            $this->pengerjaan->update($id_pengerjaan, [
                'nama_mesin' => ucwords(strtolower((string)$this->request->getPost('edit_nama_mesin'))),
                'no_mesin' => ucwords(strtolower((string)$this->request->getPost('edit_kode_mesin'))),
                'nama_komponen' => ucwords(strtolower((string)$this->request->getPost('edit_nama_komponen'))),
                'jml_barang' => $this->request->getPost('edit_jml_komponen'),
                'wkt_pengerjaan' => $this->request->getPost('edit_durasi_waktu'),
            ]);


            $data = ['success' => true];
            return $this->response->setJSON($data);
        } else {
            return $this->response->setJSON($this->validation->getErrors()); 
        }
    }

    //METHOD DELETE
    public function deleteProses($id) {
        $this->proses->delete($id);
        session()->setFlashdata('del_msg','success');
        return redirect()->back();
    }

    //METHOD MULTIPLE DELETE
    public function bulkDelProses($id) {
        $arrIds = explode(",", $id);
        $this->proses->multipleDelete($arrIds);
        session()->setFlashdata('del_msg','success');
        return redirect()->back();
    }

    // METHOD VALIDATE
    public function validateSPK($id){
        $this->validation->setRules([
            'validation' => [
                'label' => 'Validasi',
                'rules' => 'required|valid_url_strict[https]',
                'errors' => [
                    'required' => 'Link Validasi wajib diisi',
                    'valid_url_strict' => 'Link Tidak Valid. Link harus berformat https://'
                ]
            ],
        ]);
        $isDataValid = $this->validation->withRequest($this->request)->run();
        if($isDataValid){
            $this->spk->update($id, [
                'gbr_kerja' => $this->request->getPost('validation'),
            ]);
            $data = ['success' => true];
            return $this->response->setJSON($data);
        } else {
            return $this->response->setJSON($this->validation->getErrors()); 
        }
    }

    //METHOD KODE MESIN
    public function KodeMesin() {
        $nama_mesin = $this->request->getPost('nama_mesin') ? $this->request->getPost('nama_mesin') : "";
        $KodeMesin = $this->mesin->getKodeMesin($nama_mesin);
        
        $html = "<option value=''>Pilih Kode Mesin</option>";

        foreach($KodeMesin as $data){
        $html .= "<option value='".$data->no_mesin."'>".$data->no_mesin."</option>"; 
        }
        $kode_mesin_array = array('data_kode'=>$html); 
        return $this->response->setJSON(json_encode($kode_mesin_array));
    }
}