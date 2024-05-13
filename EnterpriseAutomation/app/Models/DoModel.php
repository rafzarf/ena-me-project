<?php namespace App\Models;

use CodeIgniter\Model;

class SpkModel extends Model
{
    /**
     * table name
     */
    protected $table = "do";
    protected $primaryKey = "id_do";

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
        'no_do',
        'no_penawar',
        'no_order',
        'status',
    ];
    
    // buat generate nomor spk , order dan penawaran
    // mungkin bakal dihapus kalau udh integrasi jadi gausah 
    // terlalu dipikirin
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
    
    //get() detailed data SPK by id 
    public function getDoDetail($id) {
        return $this->table('$this->table')
        ->getWhere([$this->primaryKey => $id])
        ->getResult();
    }

    //get() detailed data SPK by id 
    public function getDetailbyDo($do) {
        return $this->table('$this->table')
        ->where('no_do' , $do)
        ->get()->getResult();
    }

    public function getID($no_do) {
        return $this->table('$this->table')
        ->select('id_do')
        ->where('no_do' , $no_do)
        ->get()->getResult();
    }

    //buat kebutuhan input di logistik , biar bisa select berdasarkan no SPK yang sudah ada.
    // query builder itu urutannya syntax query misal getwhere, select , dsb baru di get() baru di getresult
    // get() itu kaya menjalanjakn query  ibarat mysqli?(conn , query)
    //sedangkan getresult() itu kaya mysqli_fetch_array / fetch assoc.
    public function getUniqueKeyDo() {
        return $this->table('$this->table')
        ->select('no_do')
        ->get()->getResult();
    }

    public function multipleDelete($id) {
        $this->table('$this->table')
        ->whereIn($this->primaryKey, $id)
        ->delete();
    }

    //fungsi search $keyword dari variable GET dari input search.
    public function search($keyword) {
        if($keyword){
            $dodata = $this->table($this->table)
            ->like('no_do', $keyword)
            ->orLike('no_penawar', $keyword)
            ->orLike('no_order', $keyword)
            ->orLike('nama_produk', $keyword)
            ->orLike('tgl_selesai', $keyword)
            ->orLike('tgl_penyerahan', $keyword)
            ->orLike('tgl_upm', $keyword)
            ->orLike('pengorder', $keyword);
        } else {
            $dodata = $this;
        }

        return $dodata;
    }
}