<?php namespace App\Models;

use CodeIgniter\Model;

class SpkModel extends Model
{
    /**
     * table name
     */
    protected $table = "spk";
    protected $primaryKey = "id_spk";

    /**
     * allowed Field
     */
    protected $allowedFields = [
        'pengorder',
        'tgl_selesai',
        'tgl_penyerahan',
        'nama_produk',	
        'jml_pesanan',
        'gbr_kerja',
        'tgl_upm',
        'no_spk',
        'no_penawar',
        'no_order',
    ];
    
    public function getLastId() {
        $db = db_connect();
        $query = $db->query('SELECT MAX(id_spk) AS lastid FROM spk LIMIT 1;');
        $row = $query->getLastRow();
        if (isset($row)) {
            return $row->lastid;
        } else {
            return 1;
        }
        
    }

    public function search($keyword) {
        if($keyword){
            $spkdata = $this->table($this->table)
            ->like('no_spk', $keyword)
            ->orLike('no_penawar', $keyword)
            ->orLike('no_order', $keyword)
            ->orLike('tgl_selesai', $keyword)
            ->orLike('tgl_penyerahan', $keyword)
            ->orLike('tgl_upm', $keyword)
            ->orLike('pengorder', $keyword);
        } else {
            $spkdata = $this;
        }

        return $spkdata;
    }

}