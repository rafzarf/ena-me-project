<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model {

    protected $table = "form_order_logistik";
    protected $primaryKey = "id_orderlog";
    protected $allowedFields = [
        'pemesan',
        'tanggal_created',
        'unit_kerja',
        'batas_waktu',
        'disetujui',
        'jml_satuan',
        'nama_barang',
        'no_barang',
        'no_gambar',
        'tgl_penerima',
        'nama_penerima',
        'tgl_pembelian',
        'tgl_pesanan',
        'berat_barang',
        'nama_pelaksana',
        'record_order',
        'catatan',
        'no_spk',
        'uraian',
        'ukuran',
    ];

    public function search($keyword , $no_spk) {
        if($keyword) {
            return $this->table($this->table)
                ->orLike('pemesan', $keyword)
                ->orLike('tanggal_created', $keyword)
                ->orLike('unit_kerja', $keyword)
                ->orLike('batas_waktu', $keyword)
                ->orLike('disetujui', $keyword)
                ->orLike('jml_satuan', $keyword)
                ->orLike('nama_barang', $keyword)
                ->orLike('uraian', $keyword)
                ->orLike('ukuran', $keyword)
                ->orLike('no_barang', $keyword)
                ->orLike('no_gambar', $keyword)
                ->orLike('tgl_penerima', $keyword)
                ->orLike('nama_penerima', $keyword)
                ->orLike('tgl_pembelian', $keyword)
                ->orLike('tgl_pesanan', $keyword)
                ->orLike('berat_barang', $keyword)
                ->orLike('nama_pelaksana', $keyword)
                ->orLike('record_order', $keyword)
                ->orLike('catatan', $keyword)
                ->orLike('no_spk', $keyword)
                ->where('no_spk', $no_spk);
        } else {
            return $this->table($this->table)
            ->where('no_spk', $no_spk);
        }
    }

    public function multipleDelete($id) {
        $this->table('$this->table')
        ->whereIn($this->primaryKey, $id)
        ->delete();
    }
}