<?php

namespace App\Controllers;
use App\Models\SpkModel;
use App\Models\ProsesModel;

class Proses extends BaseController
{

    protected $spk;
    protected $proses;

    public function __construct() {
        $this->spk = new SpkModel();
        $this->proses = new ProsesModel();
    }

    public function index($id) {
        $keyword = $this->request->getVar('keyword') ? $this->request->getVar('keyword') : "";
        $currentPage = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        $perPage = $this->request->getVar('entries') ? $this->request->getVar('entries') : 5;
        
        $data = [
            'title' => 'Proses',
            'nav_active' => 2,
            'getSPK' => $this->spk->getSPKDetail($id),
            //'getProses' => $this->proses->search($keyword,$id)->paginate($perPage),
            'pager' => $this->proses->pager,
            'current_page' => $currentPage,
            'entries' => $perPage
        ];

        return view("pages/proses.php", $data);
    }
    
}
