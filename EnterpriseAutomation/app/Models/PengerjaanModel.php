<?php

namespace App\Models;

use CodeIgniter\Model;

class PengerjaanModel extends Model
{
    protected $table            = 'pengerjaan';
    protected $primaryKey       = 'id_pengerjaan';
    protected $allowedFields = [
        'id_prosesstart',
        'nama_mesin',
        'no_mesin',
        'nama_komponen',
        'nama_produk',
        'no_spk',
        'tgl_mulai',
        'tgl_selesai',
        'status',
        'jml_barang',
        'wkt_pengerjaan',
        'pelaksana',
        'qc_img',
    ];

    public function getIDbyProses($id) {
        return $this->table('$this->table')
        ->select('id_pengerjaan')
        ->where('id_prosesstart' , $id)
        ->get()->getResult();
    }

    public function getDataBySPK($spk) {
        return $this->table('$this->table')
        ->where('no_spk' , $spk)
        ->get()->getResult();
    }

    public function returnSPK($nama_mesin , $keyword) {
        if($keyword){
            $spk =  $this->table('$this->table')
            ->select('no_spk')
            ->where('nama_mesin',$nama_mesin)
            ->like('no_spk',$keyword)
            ->orlike('nama_produk',$keyword)
            ->orderBy('no_spk', 'ASC');
        } else {
            $spk = $this->table('$this->table')
            ->select('no_spk')
            ->where('nama_mesin',$nama_mesin)
            ->orderBy('no_spk', 'ASC');
        }

        return $spk;
    }

    public function getDatabyMesinSPK($mesin , $no_spk, $keyword) {
        if($keyword){
            $data = $this->table('$this->table')
            ->where('nama_mesin',$mesin)
            ->where('no_spk',$no_spk)
            ->like('nama_produk',$keyword)
            ->orLike('nama_komponen', $keyword)
            ->orLike('no_spk', $keyword)
            ->orderBy('no_spk', 'ASC');
        } else {
            $data = $this->table('$this->table')
            ->where('nama_mesin',$mesin)
            ->where('no_spk',$no_spk)
            ->orderBy('no_spk', 'ASC');
        }

        return $data;
    }

    public function getLoadMachine($mesin) {
        return $this->table('$this->table')
        ->select('wkt_pengerjaan')
        ->where('nama_mesin' , $mesin)
        ->get()->getResult();
    }

    public function getStartHour($id) {
        return $this->table('$this->table')
        ->select('tgl_mulai')
        ->where('id_prosesstart' , $id)
        ->get()->getResult();
    }

    public function hasQC($spk) {
        return $this->table('$this->table')
        ->select()
        ->where('no_spk' , $spk)
        ->where('qc_img !=', NULL)
        ->get()->getResult();
    }
}