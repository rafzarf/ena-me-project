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

    public function search($keyword , $no_spk) {
        if($keyword) {
            return $this->table($this->table)
                ->orLike('nama_komponen', $keyword)
                ->orLike('no_spk', $keyword)
                ->where('no_spk', $no_spk);
        } else {
            return $this->table($this->table)
            ->where('no_spk', $no_spk);
        }
    }
    public function getKomponenOptions($no_spk) {
        return $this->table($this->table)
            ->select('nama_komponen')
            ->where('no_spk', $no_spk)
            ->findAll();
    }  
    public function multipleDelete($id) {
        $this->table('$this->table')
        ->whereIn($this->primaryKey, $id)
        ->delete();
    }
}