<?php namespace App\Models;

use CodeIgniter\Model;

class MesinModel extends Model
{
    /**
     * table name
     */
    protected $table = "mesin";
    protected $primaryKey = "id_mesin";

    /**
     * allowed Field
     */
    protected $allowedFields = [
        'nama_mesin',
        'no_mesin',
        'gambar_mesin',
    ];

    public function getDataMesin() {
        return $this->table('$this->table')
        ->select('id_mesin, nama_mesin , gambar_mesin')
        ->where('no_mesin', NULL)
        ->orderBy('nama_mesin', 'ASC')
        ->get()->getResult();
    }

    public function search($keyword) {
        if($keyword){
            $MesinData = $this->table($this->table)
            ->like('nama_mesin', $keyword)
            ->orLike('no_mesin', $keyword);
        } else {
            $MesinData = $this;
        }

        return $MesinData;
    }
}