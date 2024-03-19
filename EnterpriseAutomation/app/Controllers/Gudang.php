<?php

namespace App\Controllers;
use App\Models\SpkModel;
use App\Models\LogistikModel;

class Gudang extends BaseController
{

    protected $spk;
    protected $logistik;

    public function __construct() {
        $this->spk = new SpkModel();
        $this->logistik = new LogistikModel();
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

    public function createLogistik()
    {
        // lakukan validasi
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'nama_barang' => 'required',
            'no_spk' => 'required',
            'batas_waktu' => 'required',
            'nama_penerima' => 'required',
            'tempat_simpan' => 'required',
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();

        // jika data valid, simpan ke database
        if($isDataValid){
            
            $this->logistik->insert([
                "no_spk" => $this->request->getPost('no_spk'),
                "nama_penerima" => $this->request->getPost('nama_penerima'),
                "status" => $this->request->getPost('status'),
                'batas_waktu' => $this->request->getPost('batas_waktu'),
                'nama_barang' => $this->request->getPost('nama_barang'),
                'tempat_simpan' => $this->request->getPost('tempat_simpan'),
                'jml_komponen' => $this->request->getPost('jml_komponen'),
            ]);

            //call swal fire
            //return redirect('admin/news');
            session()->setFlashdata('input_msg','success');
        } else {
            session()->setFlashdata('input_msg','error');
        }
		
        // tampilkan form create
        //return view("/pages/spk", $this->dataSPK);
        return redirect()->back()->withInput(); 
    }

    public function editLogistik()
    {
        // ambil data spk yang akan diedit
        $id = $this->request->getPost('idlogistik');

        // lakukan validasi data spk
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'idlogistik' => 'required',
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        // jika data vlid, maka simpan ke database
        if($isDataValid){
            $this->logistik->update($id, [
                "nama_penerima" => $this->request->getPost('edit_nama_penerima'),
                "status" => $this->request->getPost('edit_status'),
                'batas_waktu' => $this->request->getPost('edit_batas_waktu'),
                'nama_barang' => $this->request->getPost('edit_nama_barang'),
                'tempat_simpan' => $this->request->getPost('edit_tempat_simpan'),
                'jml_komponen' => $this->request->getPost('edit_jml_komponen'),
            ]);
            session()->setFlashdata('edit_msg','success');
            //return redirect('admin/news');
        } else {
            session()->setFlashdata('edit_msg','error');
        }
        // tampilkan form edit
        return redirect()->back()->withInput();
    }

    //--------------------------------------------------------------------------

	public function deleteLogistik($id){

        $this->logistik->delete($id);
        session()->setFlashdata('del_msg','success');

        return redirect()->back();
    }
    
}
