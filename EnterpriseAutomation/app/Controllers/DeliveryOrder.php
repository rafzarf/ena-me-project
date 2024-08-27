<?php

namespace App\Controllers;
use App\Models\DeliveryOrderModel;
use App\Models\PengerjaanModel;
use App\Models\SpkModel;

class DeliveryOrder extends BaseController{

    protected $do;
    protected $validation;
    protected $pengerjaan;
    protected $spk;
    
    public function __construct() {
        $this->do = new DeliveryOrderModel();
        $this->validation = \Config\Services::validation();
        $this->pengerjaan = new PengerjaanModel();
        $this->spk = new SpkModel();
    }

    public function index($id) {
        $keyword = $this->request->getVar('keyword') ? $this->request->getVar('keyword') : "";
        $currentPage = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        $perPage = $this->request->getVar('entries') ? $this->request->getVar('entries') : 5;
        $spk = $this->spk->getSPKDetail($id);
        $no_spk = $spk[0]->no_spk;
        $no_order = $spk[0]->no_order;
        $qc_komponen = array_column($this->pengerjaan->hasQC($no_spk) , "nama_komponen");
        $pemesan = $spk[0]->pengorder;

        $data = [
            'title' => 'Delivery Order',
            'nav_active' => 2,
            'getSPK' => $spk,
            'has_qc' => $qc_komponen,
            'pemesan' => $pemesan,
            'getDO' => $this->do->search($keyword, $no_order)->paginate($perPage),
            'pager' => $this->do->pager,
            'current_page' => $currentPage,
            'entries' => $perPage,
        ];

        return view("/pages/delivery-order", $data);
    }

     //METHOD DELETE & MULTIPLE DELETE
    public function deleteDO($id) {
        $this->do->delete($id);
        session()->setFlashdata('del_msg','success');
        return redirect()->back();
    }

    public function bulkDelDO($id) {
        $arrIds = explode(",", $id);
        $this->do->multipleDelete($arrIds);
        session()->setFlashdata('del_msg','success');
        return redirect()->back();
    }

    
    public function createDO() {
        $this->validation->setRules([
            'no_order' => [
                'label' => 'Nomor Order',
                'rules' => 'required',
                'errors' => [
                    'required' => 'No Order wajib diisi',
                ]
            ],
            'pemesan' => [
                'label' => 'Pemesan',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pemesan wajib diisi',
                ]
            ],
            'nama_barang' => [
                'label' => 'Nama Barang',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Barang wajib diisi',
                ]
            ],
            'uraian' => [
                'label' => 'Uraian',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Uraian wajib diisi',
                ]
            ],
            'jumlah' => [
                'label' => 'Jumlah',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jumlah Wajib diisi',
                ]
            ],
            'bahan' => [
                'label' => 'Bahan',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Bahan wajib diisi',
                ]
            ],
            'tgl_kirim' => [
                'label' => 'Tanggal Kirim',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Kirim wajib diisi',
                ]
            ],
            'total_kirim' => [
                'label' => 'Total Kirim',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Total Kirim wajib diisi',
                ]
            ],
            'sisa_kirim' => [
                'label' => 'Sisa Kirim',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Sisa Kirim wajib diisi',
                ]
            ],
             // verification submit only pada tab terakhir
            'curr_tab' => [
                'label' => 'Tab Validation',
                'rules' => 'matches[end_tab]',
            ],
        ]); 
        $isDataValid = $this->validation->withRequest($this->request)->run(); 
        if($isDataValid){
            $this->do->insert([
                'no_order' => $this->request->getPost('no_order'),
                'pemesan' => ucwords(strtolower((string)$this->request->getPost('pemesan'))),
                'nama_barang' => ucwords(strtolower((string)$this->request->getPost('nama_barang'))),
                'uraian' => ucwords(strtolower((string)$this->request->getPost('uraian'))),
                'bahan' => ucwords(strtolower((string)$this->request->getPost('bahan'))),
                'jumlah' => $this->request->getPost('jumlah'),
                'tanggal_kirim' => ucwords(strtolower((string)$this->request->getPost('tgl_kirim'))),
                'total_kirim' => ucwords(strtolower((string)$this->request->getPost('total_kirim'))),
                'sisa_kirim' => ucwords(strtolower((string)$this->request->getPost('sisa_kirim'))),
            ]); 
            $data = ['success' => true];
            return $this->response->setJSON($data);
        } else {
            return $this->response->setJSON($this->validation->getErrors()); 
        }
    }

    public function updateDO() {
        $id = $this->request->getPost('id_edit_do');
        $this->validation->setRules([
            'edit_no_order' => [
                'label' => 'Edit Nomor Order',
                'rules' => 'required',
                'errors' => [
                    'required' => 'No Order wajib diisi',
                ]
            ],
            'edit_pemesan' => [
                'label' => 'Edit Pemesan',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pemesan wajib diisi',
                ]
            ],
            'edit_nama_barang' => [
                'label' => 'Edit Nama Barang',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Barang wajib diisi',
                ]
            ],
            'edit_uraian' => [
                'label' => 'Edit Uraian',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Uraian wajib diisi',
                ]
            ],
            'edit_jumlah' => [
                'label' => 'Edit Jumlah',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jumlah Wajib diisi',
                ]
            ],
            'edit_bahan' => [
                'label' => 'Edit Bahan',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Bahan wajib diisi',
                ]
            ],
            'edit_tgl_kirim' => [
                'label' => 'Edit Tanggal Kirim',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Kirim wajib diisi',
                ]
            ],
            'edit_total_kirim' => [
                'label' => 'Edit Total Kirim',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Total Kirim wajib diisi',
                ]
            ],
            'edit_sisa_kirim' => [
                'label' => 'Edit Sisa Kirim',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Sisa Kirim wajib diisi',
                ]
            ],
             // verification submit only pada tab terakhir
            'edit_curr_tab' => [
                'label' => 'Edit Tab Validation',
                'rules' => 'matches[edit_end_tab]',
            ],
        ]); 
        $isDataValid = $this->validation->withRequest($this->request)->run(); 
        if($isDataValid){
            $this->do->update($id, [
                'no_order' => $this->request->getPost('edit_no_order'),
                'pemesan' => ucwords(strtolower((string)$this->request->getPost('edit_pemesan'))),
                'nama_barang' => ucwords(strtolower((string)$this->request->getPost('edit_nama_barang'))),
                'uraian' => ucwords(strtolower((string)$this->request->getPost('edit_uraian'))),
                'bahan' => ucwords(strtolower((string)$this->request->getPost('edit_bahan'))),
                'jumlah' => $this->request->getPost('edit_jumlah'),
                'tanggal_kirim' => ucwords(strtolower((string)$this->request->getPost('edit_tgl_kirim'))),
                'total_kirim' => ucwords(strtolower((string)$this->request->getPost('edit_total_kirim'))),
                'sisa_kirim' => ucwords(strtolower((string)$this->request->getPost('edit_sisa_kirim'))),
            ]); 
            $data = ['success' => true];
            return $this->response->setJSON($data);
        } else {
            return $this->response->setJSON($this->validation->getErrors()); 
        }
    }

    public function FinishOrder() {
        $no_spk = $this->request->getPost('no_spk');
        $id_spk = $this->spk->getID($no_spk)[0]->id_spk;
        $status = $this->request->getPost('status');
        $this->spk->update($id_spk, [
            'status' => ucwords(strtolower((string)$status)),
        ]);
        session()->setFlashdata('finish_msg','success');
        return redirect()->back();
    }
    
}