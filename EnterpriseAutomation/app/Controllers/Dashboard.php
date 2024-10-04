<?php

namespace App\Controllers;
use App\Models\GCalendarModel;
use App\Models\SpkModel;
use App\Models\MesinModel;
use App\Models\ProsesModel;
use App\Models\OrderModel;

class Dashboard extends BaseController {

    protected $spk;
    protected $gcal;
    protected $mesin;
    protected $validation;
    protected $proses;
    protected $order;

    public function __construct() {
        $this->spk = new SpkModel();
        $this->gcal = new GCalendarModel();
        $this->mesin = new MesinModel();
        $this->proses = new ProsesModel();
        $this->validation = \Config\Services::validation();
        $this->order = new OrderModel();
    }

    public function index() {

        $data = [
            'title' => 'Dashboard',
            'nav_active' => 1,
            'dataGrafik' => $this->mesin->getDataMesin(),
            'gcalData' => $this->gcal->findAll(),
            'sedang_diproses' => $this->spk->countDiproses(),
            'selesai' => $this->spk->countSelesai(),
            'proses_keseluruhan' => $this->proses->countProses(),
            'progress_order' => $this->order->countOrder(),
        ];

        return view("pages/dashboard", $data);
    }

    public function insertConfigCalendar() {
        $this->validation->setRules([
            'clientid' => 'required|is_unique[google_calendar.CLIENT_ID]|min_length[25]',
            'apikey' => 'required|is_unique[google_calendar.API_KEY]|min_length[25]',
            'gcalid' => 'required|is_unique[google_calendar.GCAL_ID]|min_length[25]',
        ]);
        $isDataValid = $this->validation->withRequest($this->request)->run();
        if($isDataValid){
                $this->gcal->upsert([
                    "API_KEY" => $this->request->getPost('apikey'),
                    "GCAL_ID" => $this->request->getPost('gcalid'),
                    "CLIENT_ID" => $this->request->getPost('clientid'),
                ]);
            $data = ['success' => true];
            return $this->response->setJSON($data);
        } else {
            return $this->response->setJSON($this->validation->getErrors()); 
        }
    }
    
}