<?php

namespace App\Controllers;
use App\Models\MesinModel;

class Permesinan extends BaseController
{

    protected $mesin;

    public function __construct() {
        $this->mesin = new MesinModel();
    }

    public function index() {

        $keyword = $this->request->getVar('keyword') ? $this->request->getVar('keyword') : "";
        $currentPage = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        $perPage = $this->request->getVar('entries') ? $this->request->getVar('entries') : 5;

        $data = [
            'title' => 'Permesinan',
            'nav_active' => 4,
            'DataMesin' => $this->mesin->getDataMesin(),
            // 'getMesin' => $this->mesin->search($keyword)->paginate($perPage),
            // 'pager' => $this->mesin->pager,
            // 'current_page' => $currentPage,
            // 'entries' => $perPage,
        ];

        return view("pages/permesinan.php", $data);
    }

    public function createMesin()
    {
        // lakukan validasi
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'nama_mesin' => 'required',
            'gambar_mesin' => 'max_size[gambar_mesin,1024]|is_image[gambar_mesin]|mime_in[gambar_mesin,image/jpg,image/jpeg,image/png]',
        ]);

        $isDataValid = $validation->withRequest($this->request)->run();

        $getGambar =  $this->request->getFile('gambar_mesin');

        if($getGambar->isValid()) {
            $getGambar->move('assets/img');
        } else{

        }

        // jika data valid, simpan ke database
        if($isDataValid){
            $this->mesin->insert([
                "nama_mesin" => ucwords(strtolower((string)$this->request->getPost('nama_mesin'))),
                "gambar_mesin" => $getGambar->getName(),
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


    public function createTypeMesin()
    {
        // lakukan validasi
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'nama_mesin_select' => 'required',
            'no_mesin' => 'required',
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();

        // jika data valid, simpan ke database
        if($isDataValid){
            
            $this->mesin->insert([
                "nama_mesin" => ucwords(strtolower((string)$this->request->getPost('nama_mesin_select'))),
                "no_mesin" => ucwords(strtolower((string)$this->request->getPost('no_mesin'))),
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

    public function editMesin()
    {
        // ambil data spk yang akan diedit
        $id = $this->request->getPost('edit_id_mesin');

        // lakukan validasi data spk
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'edit_id_mesin' => 'required',
            'edit_nama_mesin' => 'required',
            'gambar_mesin' => 'max_size[gambar_mesin,1024]|is_image[gambar_mesin]|mime_in[gambar_mesin,image/jpg,image/jpeg,image/png]',
        ]);

        $isDataValid = $validation->withRequest($this->request)->run();

        $getEditGambar =  $this->request->getFile('gambar_mesin');

        if($getEditGambar->isValid()) {
            $getEditGambar->move('assets/img');
        } else{
            
        }

        // jika data vlid, maka simpan ke database
        if($isDataValid){
            $this->mesin->update($id, [
                "nama_mesin" => ucwords(strtolower((string)$this->request->getPost('edit_nama_mesin'))),
                "gambar_mesin" => $getEditGambar->getName(),
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

	public function deleteMesin($id){

        $this->mesin->delete($id);
        session()->setFlashdata('del_msg','success');

        return redirect()->back();
    }

    
}
