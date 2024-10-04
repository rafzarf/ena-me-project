<?php

namespace App\Controllers;
use App\Models\MesinModel;
use App\Models\SpkModel;
use App\Models\PengerjaanModel;

class Visualization extends BaseController
{

    protected $spk;
    protected $mesin;
    protected $validation;
    protected $pengerjaan;

    public function __construct() {
        $this->spk = new SpkModel();
        $this->mesin = new MesinModel();
        $this->pengerjaan = new PengerjaanModel();
        $this->validation = \Config\Services::validation();
    }

    public function index() {
        $no_spk = $this->request->getVar('spk') ? $this->request->getVar('spk') : "";
        $data = [
            'title' => 'Visualization',
            'spkData' => $this->spk->findAll(),
            'mesinData' => $this->mesin->getDataMesin(),
            'dataBySpk' => $this->spk->getDetailbySPK($no_spk),
            'dataKerja' => $this->pengerjaan->findAll(),
            'nav_active' => 3
        ];

        return view("pages/visualization.php", $data);
    }
    
}
