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
        'id_spk',
    ];

    public function search($keyword,$id) {
        if($keyword){
            $prosesdata = $this->table($this->table)
            ->where(['id_spk' => $id])
            ->like('nama_mesin', $keyword)
            ->orLike('nama_komponen', $keyword)
            ->orLike('durasi_waktu', $keyword);
        } else {
            $prosesdata = $this->table($this->table)
            ->where(['id_spk' => $id]);
        }

        return $prosesdata;
    }
}