<?php

namespace App\Controllers;
use App\Models\OrderModel;
use App\Models\SpkModel;

class Order extends BaseController
{
    protected $order;
    protected $dataOrder;
    protected $spk;
    
    public function __construct() {
        $this->order = new OrderModel();
        $this->spk = new SpkModel();
    }

    public function index($id) {

        $keyword = $this->request->getVar('keyword') ? $this->request->getVar('keyword') : "";
        $currentPage = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        $perPage = $this->request->getVar('entries') ? $this->request->getVar('entries') : 5;

        $no_spk = ($this->spk->getSPKDetail($id))[0]->no_spk;

        $dataOrder = [
            'title' => 'Order',
            'nav_active' => 2,
            'getOrder' => $this->order->search($keyword,$no_spk)->paginate($perPage),
            'pager' => $this->order->pager,
            'current_page' => $currentPage,
            'entries' => $perPage,
            'getSPK' => $this->spk->getSPKDetail($id),
        ];

        return view("/pages/order", $dataOrder);
    }

        public function createOrder() {
        // lakukan validasi
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'pengorder' => 'required',
            'no_spk' => 'required',

        ]); 
        $isDataValid = $validation->withRequest($this->request)->run(); 

        // Ambil data dari form
        if($isDataValid){
            $this->order->insert([
                'pemesan' => ucwords(strtolower((string)$this->request->getPost('pengorder'))),
                'tanggal_created' => $this->request->getPost('tgl_created'),
                'unit_kerja' => ucwords(strtolower((string)$this->request->getPost('unit_kerja'))),
                'batas_waktu' => $this->request->getPost('batas_waktu'),
                'disetujui' => $this->request->getPost('disetujui'),
                'jml_satuan' => $this->request->getPost('jml_satuan'),
                'nama_barang' => ucwords(strtolower((string)$this->request->getPost('nama_barang'))),
                'no_barang' => $this->request->getPost('no_barang'),
                'no_gambar' => ucwords(strtolower((string)$this->request->getPost('no_gambar'))),
                'tgl_penerima' => $this->request->getPost('tgl_penerima'),
                'nama_penerima' => ucwords(strtolower((string)$this->request->getPost('nama_penerima'))),
                'tgl_pembelian' => $this->request->getPost('tgl_pembelian'),
                'tgl_pesanan' => $this->request->getPost('tgl_pesanan'),
                'berat_barang' => $this->request->getPost('berat_barang'),
                'nama_pelaksana' => ucwords(strtolower((string)$this->request->getPost('nama_pelaksana'))),
                'record_order' => $this->request->getPost('record_order'),
                'catatan' => ucfirst(strtolower((string)$this->request->getPost('catatan'))),
                'no_spk' => $this->request->getPost('no_spk')
            ]); 

            // call swal fire
            session()->setFlashdata('input_msg', 'Pesanan berhasil ditambahkan!');
        } else {
            session()->setFlashdata('input_msg', 'Pesanan gagal ditambahkan!');
        }


    // tampilkan form create
    // return view (/pages/order.php)
    return redirect()->back()->withInput();
    }

    public function editOrder()
    {
        // Ambil data order yang akan diedit
        $id = $this->request->getPost('edit_id_orderlog');
        
        // Lakukan validasi, 
        // jika data valid, maka simpan ke database
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'edit_pengorder' => 'required'
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();

        //jika data valid, simpan ke database dan update
        if($isDataValid){
            $this->order->update($id, [
                'pemesan' => ucwords(strtolower((string)$this->request->getPost('edit_pengorder'))),
                'tanggal_created' => $this->request->getPost('edit_tgl_created'),
                'unit_kerja' => ucwords(strtolower((string)$this->request->getPost('edit_unit_kerja'))),
                'batas_waktu' => $this->request->getPost('edit_batas_waktu'),
                'disetujui' => $this->request->getPost('edit_disetujui'),
                'jml_satuan' => $this->request->getPost('edit_jml_satuan'),
                'nama_barang' => ucwords(strtolower((string)$this->request->getPost('edit_nama_barang'))),
                'no_barang' => $this->request->getPost('edit_no_barang'),
                'no_gambar' => ucwords(strtolower((string)$this->request->getPost('edit_no_gambar'))),
                'tgl_penerima' => $this->request->getPost('edit_tgl_penerima'),
                'nama_penerima' => ucwords(strtolower((string)$this->request->getPost('edit_nama_penerima'))),
                'tgl_pembelian' => $this->request->getPost('edit_tgl_pembelian'),
                'tgl_pesanan' => $this->request->getPost('edit_tgl_pesanan'),
                'berat_barang' => $this->request->getPost('edit_berat_barang'),
                'nama_pelaksana' => ucwords(strtolower((string)$this->request->getPost('edit_nama_pelaksana'))),
                'record_order' => $this->request->getPost('edit_record_order'),
                'catatan' => ucwords(strtolower((string)$this->request->getPost('edit_catatan'))),
            ]);
            session()->setFlashdata('edit_msg', 'Pesanan berhasil diubah!');
        } else {
            session()->setFlashdata('edit_msg', 'Pesanan gagal diubah!');
        }

        // tampilkan form edit
        return redirect()->back()->withInput();
    }


    public function deleteOrder($id)
    {
        $this->order->delete($id);
        session()->setFlashdata('del_msg','success');
        return redirect()->back();
    }

    public function bulkDelOrder($id){
        $arrIds = explode(",", $id);
        $this->order->multipleDelete($arrIds);
        session()->setFlashdata('del_msg','success');

        return redirect()->back();
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