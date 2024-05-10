<?php

namespace App\Models;

use CodeIgniter\Model;

class KomponenModel extends Model {

    protected $table = "komponen";
    protected $primaryKey = "id_komponen";
    protected $allowedFields = [
        'nama_komponen',
        'no_spk',
    ];
    
    public function getKomponenOptions($no_spk) {
        return $this->table($this->table)
            ->select('nama_komponen')
            ->where('no_spk', $no_spk)
            ->findAll();
    }
}