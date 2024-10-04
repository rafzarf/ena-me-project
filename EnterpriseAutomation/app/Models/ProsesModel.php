<?php namespace App\Models;

use CodeIgniter\Model;

class ProsesModel extends Model
{
    /**
     * table name
     */
    protected $table = "proses";
    protected $primaryKey = "id_proses_start";
    /**
     * allowed Field
     */
    protected $allowedFields = [
        'nama_mesin',
        'nama_komponen',
        'durasi_waktu',
        'no_spk',
        'jml_komponen',
        'status',
        'no_mesin',
    ];

    public function search($keyword, $no_spk) {
        if($keyword){
            $prosesdata = $this->table($this->table)
            ->where(['no_spk' => $no_spk])
            ->like('nama_mesin', $keyword)
            ->orLike('nama_komponen', $keyword)
            ->orderBy('nama_komponen', 'ASC');
        } else {
            $prosesdata = $this->table($this->table)
            ->where(['no_spk' => $no_spk])
            ->orderBy('nama_komponen', 'ASC');
        }
        return $prosesdata;
    }

    public function multipleDelete($id) {
        $this->table('$this->table')
        ->whereIn($this->primaryKey, $id)
        ->delete();
    }

    public function returnCountAll($spk) {
        return $this->table('$this->table')
        ->where('no_spk', $spk)
        ->countAllResults();
    }

    public function returnFinishCount($spk) {
        return $this->table('$this->table')
        ->where('no_spk', $spk)
        ->where('status' , "Selesai")
        ->countAllResults();
    }

    public function countProses() {
        return $this->table('$this->table')
        ->where('status' , "Diproses")
        ->orWhere('status' , "Menunggu")
        ->countAllResults();
    }
}