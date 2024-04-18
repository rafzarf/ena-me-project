<?php namespace App\Models;

use CodeIgniter\Model;

class ProsesModel extends Model
{
    /**
     * table name
     */
    protected $table = "form_proses";
    protected $primaryKey = "id_proses_start";

    /**
     * allowed Field
     */
    protected $allowedFields = [
        'komponen',
        'kuantitas',
        'durasi_waktu',
        'nama_pembuat',	
        'tgl_pembuat',
    ];

    public function search($keyword,$id) {
        if($keyword){
            $prosesdata = $this->table($this->table)
            ->getWhere(['id_spk' => $id])
            ->like('no_order', $keyword)
            ->orLike('komponen', $keyword)
            ->orLike('nama_pembuat', $keyword)
            ->orLike('tgl_pembuatan', $keyword);
        } else {
            $prosesdata = $this->table($this->table)
            ->getWhere(['id_spk' => $id]);
        }

        return $prosesdata;
    }
}