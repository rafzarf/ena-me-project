<?php

namespace App\Controllers;
use App\Models\SpkModel;

class Spk extends BaseController
{
    protected $spk;
    protected $dataSPK;
    protected $validation;

    public function __construct() {
        $this->spk = new SpkModel();
        $this->validation = \Config\Services::validation();
    }

    public function index() {
        $keyword = $this->request->getVar('keyword') ? $this->request->getVar('keyword') : "";
        $currentPage = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        $perPage = $this->request->getVar('entries') ? $this->request->getVar('entries') : 5;

        $this->dataSPK = [
            'title' => 'SPK',
            'nav_active' => 2,
            'getSPK' => $this->spk->search($keyword)->paginate($perPage),
            'latest_id' => $this->spk->getLastId(),
            'pager' => $this->spk->pager,
            'current_page' => $currentPage,
            'entries' => $perPage,
        ];
        return view("/pages/spk", $this->dataSPK);
    }

    // METHOD CREATE
    public function createSPK(){

        $this->validation->setRules([
            'pengorder' => [
                'label' => 'Pemesan',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pemesan wajib diisi',
                ]
            ],
            'no_spk' => [
                'label' => 'Nomor SPK',
                'rules' => 'required|is_unique[spk.no_spk]',
                'errors' => [
                    'required' => 'Nomor SPK wajib diisi',
                    'is_unique' => 'Nomor SPK sudah ada',
                ]
            ],
            'tgl_selesai' => [
                'label' => 'Batas Waktu',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Batas Waktu wajib diisi',
                ]
            ],
            'tgl_penyerahan' => [
                'label' => 'Tanggal Penyerahan',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Penyerahan wajib diisi',
                ]
            ],
            'nama_produk' => [
                'label' => 'Nama Produk',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Produk wajib diisi',
                ]
            ],
            'jml_pesanan' => [
                'label' => 'Jumlah',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jumlah wajib diisi',
                ]
            ],
            'tgl_upm' => [
                'label' => 'Tanggal UPM',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal UPM wajib diisi',
                ]
            ],
            'no_penawar' => [
                'label' => 'Nomor Penawaran',
                'rules' => 'required|is_unique[spk.no_penawar]',
                'errors' => [
                    'required' => 'Nomor Penawaran wajib diisi',
                    'is_unique' => 'Nomor Penawaran sudah ada',
                ]
            ],
            'no_order' => [
                'label' => 'Nomor Order',
                'rules' => 'required|is_unique[spk.no_order]',
                'errors' => [
                    'required' => 'Nomor Order wajib diisi',
                    'is_unique' => 'Nomor Order sudah ada',
                ]
            ],
        ]);
        $isDataValid = $this->validation->withRequest($this->request)->run();
        if($isDataValid){
            $this->spk->insert([
                "pengorder" => ucwords(strtolower((string)$this->request->getPost('pengorder'))),
                "tgl_selesai" => $this->request->getPost('tgl_selesai'),
                "tgl_penyerahan" => $this->request->getPost('tgl_penyerahan'),
                'nama_produk' => ucwords(strtolower((string)$this->request->getPost('nama_produk'))),
                'jml_pesanan' => $this->request->getPost('jml_pesanan'),
                'no_spk' => $this->request->getPost('no_spk'),
                'tgl_upm' => $this->request->getPost('tgl_upm'),
                'no_penawar' => $this->request->getPost('no_penawar'),
                'no_order' => $this->request->getPost('no_order'),
            ]);

            //REDIRECT PAGE DENGAN LOGIC BACKEND 
            //session()->setFlashdata('input_msg','success');
            // tampilkan form create
            //return redirect()->back()->withInput();

            //REDIRECT PAGE DENGAN LOGIC FRONTEND, PAKE AJAX, SENT RESPONSE BUAT BISA RELOAD DI JS
            $data = ['success' => true];
            return $this->response->setJSON($data);
        } else {
            return $this->response->setJSON($this->validation->getErrors()); 
        }
    }

    // METHOD EDIT
    public function editSPK() {
        $id = $this->request->getPost('idspk');
        $this->validation->setRules([
            'idspk' => [
                'label' => 'ID SPK',
                'rules' => 'required',
                'errors' => [
                    'required' => 'ID SPK wajib diisi',
                ]
            ],
            'edit_pengorder' => [
                'label' => 'Edit Pemesan',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pemesan wajib diisi',
                ]
            ],
            'edit_tgl_selesai' => [
                'label' => 'Edit Batas Waktu',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Batas Waktu wajib diisi',
                ]
            ],
            'edit_tgl_penyerahan' => [
                'label' => 'Edit Tanggal Penyerahan',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Penyerahan wajib diisi',
                ]
            ],
            'edit_nama_produk' => [
                'label' => 'Edit Nama Produk',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Produk wajib diisi',
                ]
            ],
            'edit_jml_pesanan' => [
                'label' => 'Edit Jumlah',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jumlah wajib diisi',
                ]
            ],
            'edit_tgl_upm' => [
                'label' => 'Edit Tanggal UPM',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal UPM wajib diisi',
                ]
            ],
        ]);
        $isDataValid = $this->validation->withRequest($this->request)->run();
        if($isDataValid){
            $this->spk->update($id, [
                "pengorder" => ucwords(strtolower((string)$this->request->getPost('edit_pengorder'))),
                "tgl_selesai" => $this->request->getPost('edit_tgl_selesai'),
                "tgl_penyerahan" => $this->request->getPost('edit_tgl_penyerahan'),
                'nama_produk' => ucwords(strtolower((string)$this->request->getPost('edit_nama_produk'))),
                'jml_pesanan' => $this->request->getPost('edit_jml_pesanan'),
                'tgl_upm' => $this->request->getPost('edit_tgl_upm'),
                
            ]);
            $data = ['success' => true];
            return $this->response->setJSON($data);
        } else {
            return $this->response->setJSON($this->validation->getErrors()); 
        }
    }

    //METHOD DELETE & MULTI DELETE
    //buat delete gapake AJAX karena gapenting juga , jadi keep kaya gini aja
	public function deleteSPK($id){
        $this->spk->delete($id);
        session()->setFlashdata('del_msg','success');
        return redirect()->back();
    }

    public function bulkDelSPK($id){
        $arrIds = explode(",", $id);
        $this->spk->multipleDelete($arrIds);
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
}