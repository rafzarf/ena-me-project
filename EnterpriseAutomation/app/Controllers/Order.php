<?php

namespace App\Controllers;
use App\Models\OrderModel;
use App\Models\SpkModel;
use Dompdf\Dompdf;

class Order extends BaseController {
    protected $order;
    protected $dataOrder;
    protected $spk;
    protected $validation;
    
    public function __construct() {
        $this->order = new OrderModel();
        $this->spk = new SpkModel();
        $this->validation = \Config\Services::validation();
    }

    public function index($id) {
        $keyword = $this->request->getVar('keyword') ? $this->request->getVar('keyword') : "";
        $currentPage = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        $perPage = $this->request->getVar('entries') ? $this->request->getVar('entries') : 5;
        $no_spk = ($this->spk->getSPKDetail($id))[0]->no_spk;
        $dataOrder = [
            'title' => 'Order',
            'nav_active' => 2,
            'getOrder' => $this->order->search($keyword,$no_spk)->paginate($perPage),
            'pager' => $this->order->pager,
            'current_page' => $currentPage,
            'entries' => $perPage,
            'getSPK' => $this->spk->getSPKDetail($id),
        ];
        return view("/pages/order", $dataOrder);
    }

    public function createOrder() {
        $this->validation->setRules([
            'pengorder' => [
                'label' => 'Pemesan',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pemesan wajib diisi',
                ]
            ],
            'tgl_created' => [
                'label' => 'Tanggal Dibuat',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal wajib diisi',
                ]
            ],
            'unit_kerja' => [
                'label' => 'Unit Kerja',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Unit Kerja wajib diisi',
                ]
            ],
            'batas_waktu' => [
                'label' => 'Batas Waktu',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Batas Waktu wajib diisi',
                ]
            ],
            'disetujui' => [
                'label' => 'Disetujui',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Wajib diisi',
                ]
            ],
            'jml_satuan' => [
                'label' => 'Jumlah',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jumlah wajib diisi',
                ]
            ],
            'nama_barang' => [
                'label' => 'Nama Barang',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Barang wajib diisi',
                ]
            ],
            'uraian' => [
                'label' => 'Uraian Barang',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Uraian Barang wajib diisi',
                ]
            ],
            'ukuran' => [
                'label' => 'Ukuran Barang',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Ukuran Barang wajib diisi',
                ]
            ],
            // 'no_barang' => [
            //     'label' => 'Nomor Barang',
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Nomor Barang wajib diisi',
            //     ]
            // ],
            // 'no_gambar' => [
            //     'label' => 'Nomor Gambar',
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Nomor Gambar wajib diisi',
            //     ]
            // ],
            // 'tgl_penerima' => [
            //     'label' => 'Tanggal Penerima',
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Tanggal Penerima wajib diisi',
            //     ]
            // ],
            // 'nama_penerima' => [
            //     'label' => 'Nama Penerima',
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Nama Penerima wajib diisi',
            //     ]
            // ],
            // 'tgl_pembelian' => [
            //     'label' => 'Tanggal Pembelian',
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Tanggal Pembelian wajib diisi',
            //     ]
            // ],
            // 'tgl_pesanan' => [
            //     'label' => 'Tanggal Pesanan',
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Tanggal Pesanan wajib diisi',
            //     ]
            // ],
            // 'berat_barang' => [
            //     'label' => 'Berat Barang',
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Berat wajib diisi',
            //     ]
            // ],
            // 'nama_pelaksana' => [
            //     'label' => 'Nama Pelaksana',
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Nama Pelaksana wajib diisi',
            //     ]
            // ],
            'no_spk' => [
                'label' => 'Nomor SPK',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nomor SPK wajib diisi',
                ]
            ],
             // verification submit only pada tab terakhir
            'curr_tab' => [
                'label' => 'Tab Validation',
                'rules' => 'matches[end_tab]',
            ],
        ]); 
        $isDataValid = $this->validation->withRequest($this->request)->run(); 
        if($isDataValid){
            $this->order->insert([
                'pemesan' => ucwords(strtolower((string)$this->request->getPost('pengorder'))),
                'tanggal_created' => $this->request->getPost('tgl_created'),
                'unit_kerja' => ucwords(strtolower((string)$this->request->getPost('unit_kerja'))),
                'batas_waktu' => $this->request->getPost('batas_waktu'),
                'disetujui' => $this->request->getPost('disetujui'),
                'jml_satuan' => $this->request->getPost('jml_satuan'),
                'nama_barang' => ucwords(strtolower((string)$this->request->getPost('nama_barang'))),
                'uraian' => ucwords(strtolower((string)$this->request->getPost('uraian'))),
                'ukuran' => ucwords(strtolower((string)$this->request->getPost('ukuran'))),
                'no_barang' => $this->request->getPost('no_barang'),
                'no_gambar' => ucwords(strtolower((string)$this->request->getPost('no_gambar'))),
                'tgl_penerima' => $this->request->getPost('tgl_penerima'),
                'nama_penerima' => ucwords(strtolower((string)$this->request->getPost('nama_penerima'))),
                'tgl_pembelian' => $this->request->getPost('tgl_pembelian'),
                'tgl_pesanan' => $this->request->getPost('tgl_pesanan'),
                'berat_barang' => $this->request->getPost('berat_barang'),
                'nama_pelaksana' => ucwords(strtolower((string)$this->request->getPost('nama_pelaksana'))),
                'record_order' => $this->request->getPost('record_order'),
                'catatan' => ucfirst(strtolower((string)$this->request->getPost('catatan'))),
                'no_spk' => $this->request->getPost('no_spk')
            ]); 
            $data = ['success' => true];
            return $this->response->setJSON($data);
        } else {
            return $this->response->setJSON($this->validation->getErrors()); 
        }
    }

    public function editOrder() {
        $id = $this->request->getPost('edit_id_orderlog');
        $this->validation->setRules([
            'edit_pengorder' => [
                'label' => 'Edit Pemesan',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pemesan wajib diisi',
                ]
            ],
            'edit_tgl_created' => [
                'label' => 'Edit Tanggal Dibuat',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal wajib diisi',
                ]
            ],
            'edit_unit_kerja' =>  [
                'label' => 'Edit Unit Kerja',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Unit Kerja wajib diisi',
                ]
            ],
            'edit_batas_waktu' =>  [
                'label' => 'Edit Batas Waktu',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Batas Waktu wajib diisi',
                ]
            ],
            'edit_disetujui' => [
                'label' => 'Edit Disetujui',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Wajib diisi',
                ]
            ],
            'edit_jml_satuan' => [
                'label' => 'Edit Jumlah',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jumlah wajib diisi',
                ]
            ],
            'edit_nama_barang' => [
                'label' => 'Edit Nama Barang',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Barang wajib diisi',
                ]
            ],
            'edit_uraian' => [
                'label' => 'Edit Uraian Barang',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Uraian Barang wajib diisi',
                ]
            ],
            'edit_ukuran' => [
                'label' => 'Edit Ukuran Barang',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Ukuran Barang wajib diisi',
                ]
            ],
            // 'edit_no_barang' => [
            //     'label' => 'Edit Nomor Barang',
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Nomor Barang wajib diisi',
            //     ]
            // ],
            // 'edit_no_gambar' => [
            //     'label' => 'Edit Nomor Gambar',
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Nomor Gambar wajib diisi',
            //     ]
            // ],
            // 'edit_tgl_penerima' => [
            //     'label' => 'Edit Tanggal Penerima',
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Tanggal Penerima wajib diisi',
            //     ]
            // ],
            // 'edit_nama_penerima' => [
            //     'label' => 'Edit Nama Penerima',
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Nama Penerima wajib diisi',
            //     ]
            // ],
            // 'edit_tgl_pembelian' => [
            //     'label' => 'Edit Tanggal Pembelian',
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Tanggal Pembelian wajib diisi',
            //     ]
            // ],
            // 'edit_tgl_pesanan' => [
            //     'label' => 'Edit Tanggal Pesanan',
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Tanggal Pesanan wajib diisi',
            //     ]
            // ],
            // 'edit_berat_barang' => [
            //     'label' => 'Edit Berat Barang',
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Berat wajib diisi',
            //     ]
            // ],
            // 'edit_nama_pelaksana' => [
            //     'label' => 'Edit Nama Pelaksana',
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Nama Pelaksana wajib diisi',
            //     ]
            // ],
        ]);
        $isDataValid = $this->validation->withRequest($this->request)->run();
        if($isDataValid){
            $this->order->update($id, [
                'pemesan' => ucwords(strtolower((string)$this->request->getPost('edit_pengorder'))),
                'tanggal_created' => $this->request->getPost('edit_tgl_created'),
                'unit_kerja' => ucwords(strtolower((string)$this->request->getPost('edit_unit_kerja'))),
                'batas_waktu' => $this->request->getPost('edit_batas_waktu'),
                'disetujui' => $this->request->getPost('edit_disetujui'),
                'jml_satuan' => $this->request->getPost('edit_jml_satuan'),
                'nama_barang' => ucwords(strtolower((string)$this->request->getPost('edit_nama_barang'))),
                'uraian' => ucwords(strtolower((string)$this->request->getPost('edit_uraian'))),
                'ukuran' => ucwords(strtolower((string)$this->request->getPost('edit_ukuran'))),
                'no_barang' => $this->request->getPost('edit_no_barang'),
                'no_gambar' => ucwords(strtolower((string)$this->request->getPost('edit_no_gambar'))),
                'tgl_penerima' => $this->request->getPost('edit_tgl_penerima'),
                'nama_penerima' => ucwords(strtolower((string)$this->request->getPost('edit_nama_penerima'))),
                'tgl_pembelian' => $this->request->getPost('edit_tgl_pembelian'),
                'tgl_pesanan' => $this->request->getPost('edit_tgl_pesanan'),
                'berat_barang' => $this->request->getPost('edit_berat_barang'),
                'nama_pelaksana' => ucwords(strtolower((string)$this->request->getPost('edit_nama_pelaksana'))),
                'record_order' => $this->request->getPost('edit_record_order'),
                'catatan' => ucwords(strtolower((string)$this->request->getPost('edit_catatan'))),
            ]);
            $data = ['success' => true];
            return $this->response->setJSON($data);
        } else {
            return $this->response->setJSON($this->validation->getErrors()); 
        }
    }

    //METHOD DELETE & MULTIPLE DELETE
    public function deleteOrder($id) {
        $this->order->delete($id);
        session()->setFlashdata('del_msg','success');
        return redirect()->back();
    }

    public function bulkDelOrder($id) {
        $arrIds = explode(",", $id);
        $this->order->multipleDelete($arrIds);
        session()->setFlashdata('del_msg','success');
        return redirect()->back();
    }

    //METHOD VALIDATE
    public function validateSPK($id) {
        $this->validation->setRules([
            'validation' => [
                'label' => 'Validasi',
                'rules' => 'required|valid_url_strict[https]',
                'errors' => [
                    'required' => 'Link Validasi wajib diisi',
                    'valid_url_strict' => 'Link Tidak Valid. Link harus berformat https://'
                ]
            ],
        ]);
        $isDataValid = $this->validation->withRequest($this->request)->run();
        if($isDataValid){
            $this->spk->update($id, [
                'gbr_kerja' => $this->request->getPost('validation'),
            ]);
            $data = ['success' => true];
            return $this->response->setJSON($data);
        } else {
            return $this->response->setJSON($this->validation->getErrors()); 
        }
    }

    public function GeneratePdfOrder()
    {
        $filename = date('y-m-d-H-i-s'). '-Form_Order_ME';

        $HTML = "";

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        // load HTML content
        $dompdf->loadHtml(view('pdf_view'));

        // (optional) setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // render html as PDF
        $dompdf->render();

        // output the generated pdf
        $dompdf->stream($filename);
    }
}