<?php namespace App\Models;

use CodeIgniter\Model;

class LogistikModel extends Model
{
    /**
     * table name
     */
    protected $table = "stok_gudang";
    protected $primaryKey = "id_stoklogistik";

    /**
     * allowed Field
     */
    protected $allowedFields = [
        'nama_penerima',
        'status',
        'batas_waktu',
        'nama_barang',	
        'tempat_simpan',
        'jml_komponen',
        'no_spk',
    ];

    public function search($keyword) {
        if($keyword){
            $logistikData = $this->table($this->table)
            ->like('nama_penerima', $keyword)
            ->orLike('tempat_simpan', $keyword)
            ->orLike('nama_barang', $keyword);
        } else {
            $logistikData = $this;
        }

        return $logistikData;
    }

    public function multipleDelete($id) {
        $this->table('$this->table')
        ->whereIn($this->primaryKey, $id)
        ->delete();
    }
}