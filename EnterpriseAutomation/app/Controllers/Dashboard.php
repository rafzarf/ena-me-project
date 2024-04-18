<?php

namespace App\Controllers;
use App\Models\GCalendarModel;
use App\Models\SpkModel;

class Dashboard extends BaseController {

    protected $spk;
    protected $gcal;
    protected $validation;

    public function __construct() {
        $this->spk = new SpkModel();
        $this->gcal = new GCalendarModel();
        $this->validation = \Config\Services::validation();
    }

    public function index() {

        $data = [
            'title' => 'Dashboard',
            'nav_active' => 1,
            'gcalData' => $this->gcal->findAll()
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