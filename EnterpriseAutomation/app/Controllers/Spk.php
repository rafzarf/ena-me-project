<?php

namespace App\Controllers;
use App\Models\SpkModel;

class Spk extends BaseController
{
    protected $spk;
    protected $dataSPK;

    public function __construct() {
        $this->spk = new SpkModel();
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

    public function createSPK()
    {
        // lakukan validasi
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'pengorder' => 'required',
            'no_spk' => 'required'
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();

        // jika data valid, simpan ke database
        if($isDataValid){
            
            $this->spk->insert([
                "pengorder" => $this->request->getPost('pengorder'),
                "tgl_selesai" => $this->request->getPost('tgl_selesai'),
                "tgl_penyerahan" => $this->request->getPost('tgl_penyerahan'),
                'nama_produk' => $this->request->getPost('nama_produk'),
                'jml_pesanan' => $this->request->getPost('jml_pesanan'),
                'no_spk' => $this->request->getPost('no_spk'),
                'tgl_upm' => $this->request->getPost('tgl_upm'),
                'no_penawar' => $this->request->getPost('no_penawar'),
                'no_order' => $this->request->getPost('no_order'),
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

    //--------------------------------------------------------------------------

    public function editSPK()
    {
        // ambil data spk yang akan diedit
        //$data['spk'] = $this->spk->where('id_spk', $id);
        $id = $this->request->getPost('idspk');

        // lakukan validasi data spk
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'idspk' => 'required',
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        // jika data vlid, maka simpan ke database
        if($isDataValid){
            $this->spk->update($id, [
                "pengorder" => $this->request->getPost('edit_pengorder'),
                "tgl_selesai" => $this->request->getPost('edit_tgl_selesai'),
                "tgl_penyerahan" => $this->request->getPost('edit_tgl_penyerahan'),
                'nama_produk' => $this->request->getPost('edit_nama_produk'),
                'jml_pesanan' => $this->request->getPost('edit_jml_pesanan'),
                'tgl_upm' => $this->request->getPost('edit_tgl_upm'),
                
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

	public function deleteSPK($id){

        $this->spk->delete($id);
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