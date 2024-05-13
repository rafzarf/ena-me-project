<?php

namespace App\Controllers;
use App\Models\DoModel;

class DeliverOrder extends BaseController
{
   protected $deliverOrder;
   protected $dataDeliverOrder;
   protected $validation;

   public function __construct() {
    $this->deliverOrder = new DoModel();
       $this->validation = \Config\Services::validation();
   }

   public function index() {
       $keyword = $this->request->getVar('keyword') ? $this->request->getVar('keyword') : "";
       $currentPage = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
       $perPage = $this->request->getVar('entries') ? $this->request->getVar('entries') : 5;

       $this->dataDeliverOrder = [
           'title' => 'Deliver Order',
           'nav_active' => 2,
           'getDeliverOrder' => $this->deliverOrder->search($keyword)->paginate($perPage),
           'latest_id' => $this->deliverOrder->getLastId(),
           'pager' => $this->deliverOrder->pager,
           'current_page' => $currentPage,
           'entries' => $perPage,
       ];
       return view("/pages/deliverOrder", $this->dataDeliverOrder);
   }

   // METHOD CREATE
   public function createDeliverOrder(){
       $this->validation->setRules([
           'no_order' => [
               'label' => 'Nomor Order',
               'rules' => 'required|is_unique[deliver_order.no_order]',
               'errors' => [
                   'required' => 'Nomor Order wajib diisi',
                   'is_unique' => 'Nomor Order sudah ada',
               ]
           ],
           'tanggal_kirim' => [
               'label' => 'Tanggal Kirim',
               'rules' => 'required',
               'errors' => [
                   'required' => 'Tanggal Kirim wajib diisi',
               ]
           ],
           'nama_barang_jadi' => [
               'label' => 'Nama Barang Jadi',
               'rules' => 'required',
               'errors' => [
                   'required' => 'Nama Barang Jadi wajib diisi',
               ]
           ],
           'bahan' => [
               'label' => 'Bahan',
               'rules' => 'required',
               'errors' => [
                   'required' => 'Bahan wajib diisi',
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
           'keteranganan' => [
               'label' => 'Keterangan',
               'rules' => 'required',
               'errors' => [
                   'required' => 'Keterangan wajib diisi',
               ]
           ],
           'catatan' => [
               'label' => 'Catatan',
               'rules' => 'required',
               'errors' => [
                   'required' => 'Catatan wajib diisi',
               ]
           ],
           'status_persetujuan' => [
               'label' => 'Status Persetujuan',
               'rules' => 'required',
               'errors' => [
                   'required' => 'Status Persetujuan wajib diisi',
               ]
           ],
       ]);
       $isDataValid = $this->validation->withRequest($this->request)->run();
       if($isDataValid){
           $this->deliverOrder->insert([
               "no_order" => $this->request->getPost('no_order'),
               "tanggal_kirim" => $this->request->getPost('tanggal_kirim'),
               "nama_barang_jadi" => ucwords(strtolower((string)$this->request->getPost('nama_barang_jadi'))),
               "bahan" => ucwords(strtolower((string)$this->request->getPost('bahan'))),
               "total_kirim" => $this->request->getPost('total_kirim'),
               "sisa_kirim" => $this->request->getPost('sisa_kirim'),
               "keteranganan" => ucwords(strtolower((string)$this->request->getPost('keteranganan'))),
               "catatan" => ucwords(strtolower((string)$this->request->getPost('catatan'))),
               "status_persetujuan" => ucwords(strtolower((string)$this->request->getPost('status_persetujuan'))),
           ]);

           $data = ['success' => true];
           return $this->response->setJSON($data);
       } else {
           return $this->response->setJSON($this->validation->getErrors()); 
       }
   }
   
   public function editDeliverOrder() {
    $id = $this->request->getPost('id');
    $this->validation->setRules([
        'id' => [
            'label' => 'ID',
            'rules' => 'required',
            'errors' => [
                'required' => 'ID wajib diisi',
            ]
        ],
        'edit_no_order' => [
            'label' => 'Edit Nomor Order',
            'rules' => 'required',
            'errors' => [
                'required' => 'Nomor Order wajib diisi',
            ]
        ],
        'edit_tanggal_kirim' => [
            'label' => 'Edit Tanggal Kirim',
            'rules' => 'required',
            'errors' => [
                'required' => 'Tanggal Kirim wajib diisi',
            ]
        ],
        'edit_nama_barang_jadi' => [
            'label' => 'Edit Nama Barang Jadi',
            'rules' => 'required',
            'errors' => [
                'required' => 'Nama Barang Jadi wajib diisi',
            ]
        ],
        'edit_bahan' => [
            'label' => 'Edit Bahan',
            'rules' => 'required',
            'errors' => [
                'required' => 'Bahan wajib diisi',
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
        'edit_keteranganan' => [
            'label' => 'Edit Keterangan',
            'rules' => 'required',
            'errors' => [
                'required' => 'Keterangan wajib diisi',
            ]
        ],
        'edit_catatan' => [
            'label' => 'Edit Catatan',
            'rules' => 'required',
            'errors' => [
                'required' => 'Catatan wajib diisi',
            ]
        ],
        'edit_status_persetujuan' => [
            'label' => 'Edit Status Persetujuan',
            'rules' => 'required',
            'errors' => [
                'required' => 'Status Persetujuan wajib diisi',
            ]
        ],
    ]);
    $isDataValid = $this->validation->withRequest($this->request)->run();
    if($isDataValid){
        $this->deliverOrder->update($id, [
            "no_order" => $this->request->getPost('edit_no_order'),
            "tanggal_kirim" => $this->request->getPost('edit_tanggal_kirim'),
            "nama_barang_jadi" => ucwords(strtolower((string)$this->request->getPost('edit_nama_barang_jadi'))),
            "bahan" => ucwords(strtolower((string)$this->request->getPost('edit_bahan'))),
            "total_kirim" => $this->request->getPost('edit_total_kirim'),
            "sisa_kirim" => $this->request->getPost('edit_sisa_kirim'),
            "keteranganan" => ucwords(strtolower((string)$this->request->getPost('edit_keteranganan'))),
            "catatan" => ucwords(strtolower((string)$this->request->getPost('edit_catatan'))),
            "status_persetujuan" => ucwords(strtolower((string)$this->request->getPost('edit_status_persetujuan'))),
        ]);
        $data = ['success' => true];
        return $this->response->setJSON($data);
    } else {
        return $this->response->setJSON($this->validation->getErrors());
    }
 }

    // METHOD DELETE & MULTI DELETE
    // buat delete gapake AJAX karena gapenting juga , jadi keep kaya gini aja
    public function deleteDeliverOrder($id){
        $this->deliverOrder->delete($id);
        session()->setFlashdata('del_msg','success');
        return redirect()->back();
    }
    
    public function bulkDelDeliverOrder($id){
        $arrIds = explode(",", $id);
        $this->deliverOrder->multipleDelete($arrIds);
        session()->setFlashdata('del_msg','success');
        return redirect()->back();
    }
 
    // METHOD VALIDATE
    public function validateDeliverOrder($id){
        $this->validation->setRules([
            'status_persetujuan' => [
                'label' => 'Status Persetujuan',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status Persetujuan wajib diisi',
                ]
            ],
        ]);
        $isDataValid = $this->validation->withRequest($this->request)->run();
        if($isDataValid){
            $this->deliverOrder->update($id, [
                'status_persetujuan' => ucwords(strtolower((string)$this->request->getPost('status_persetujuan'))),
            ]);
            $data = ['success' => true];
            return $this->response->setJSON($data);
        } else {
            return $this->response->setJSON($this->validation->getErrors());
        }
    }
}