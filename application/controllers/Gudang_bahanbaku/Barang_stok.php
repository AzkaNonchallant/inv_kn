<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sk_barang_stock extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        // check_not_login();
        $this->load->model('Stock_keeper/M_sk_barang_stock');
        $this->load->model('Stock_keeper/M_sk_barang_masuk');
    }

    public function index()
    {
        $data['result'] = $this->M_sk_barang_stock->get()->result_array();

        for ($i = 0; $i < count($data['result']); $i++) {
            $id_barang = $data['result'][$i]['id_barang'];

            $stok = $data['result'][$i]['qty'];
            $data['result'][$i]['sisa'] = $stok;
        }

        $this->template->load('template', 'content/Stock_keeper/sk_barang_stock', $data);
    }

    public function update()
    {
        $data['id_barang'] = $this->input->post('id_barang', TRUE);
        $data['kode'] = $this->input->post('kode', TRUE);
        $data['nama'] = $this->input->post('nama', TRUE);
        $data['satuan'] = $this->input->post('satuan', TRUE);
        $respon = $this->M_sk_barang->update($data);

        if ($respon) {
            header('location:' . base_url('Stock_keeper/sk_barang_stock') . '?alert=success&msg=Selamat anda berhasil meng-update data barang');
        } else {
            header('location:' . base_url('Stock_keeper/sk_barang_stock') . '?alert=error&msg=Maaf anda gagal meng-update data barang');
        }
    }
}
