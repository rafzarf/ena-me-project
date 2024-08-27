<?php namespace App\Models;

use CodeIgniter\Model;

class DeliveryOrderModel extends Model
{
    protected $table = "delivery_order";
    protected $primaryKey = "id_do";
    protected $allowedFields = [
        'pemesan',
        'no_order',
        'tanggal_kirim',
        'nama_barang',
        'uraian',
        'bahan',
        'jumlah',
        'total_kirim',
        'sisa_kirim',
        'keterangan',
    ];

    public function search($keyword , $no_order) {
        if($keyword) {
            return $this->table($this->table)
                ->orLike('pemesan', $keyword)
                ->orLike('no_order', $keyword)
                ->orLike('tanggal_kirim', $keyword)
                ->orLike('nama_barang', $keyword)
                ->orLike('uraian', $keyword)
                ->orLike('bahan', $keyword)
                ->orLike('jumlah', $keyword)
                ->orLike('uraian', $keyword)
                ->orLike('total_kirim', $keyword)
                ->orLike('sisa_kirim', $keyword)
                ->orLike('keterangan', $keyword);
        } else {
            return $this->table($this->table)
            ->where('no_order', $no_order);
        }
    }

    public function multipleDelete($id) {
        $this->table('$this->table')
        ->whereIn($this->primaryKey, $id)
        ->delete();
    }
}