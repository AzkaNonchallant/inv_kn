<?php
class Sk_barang_stock extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_stock_keeper/M_sk_barang_stock');
    }

    public function index()
    {
        // $data['row'] = $this->customer_m->get();
        $data['result'] = $this->M_sk_barang_stock->get()->result_array();
        // $data['res_permintaan'] = $this->M_barang->get_per()->result_array();
        for ($i = 0; $i < count($data['result']); $i++) {
            if (isset($data['result'][$i]['id_barang'])) {
                $id_barang = $data['result'][$i]['id_barang'];
            } else {
                // Handle the case where 'id_barang' is not set
                $id_barang = 'Unknown';
            }
        }
        $this->template->load('template', 'content/stock_keeper/sk_barang_stock', $data);

        foreach ($data['result'] as &$row) {
            if (!isset($row['stock'])) {
                $row['stock'] = 0; // Default jika stock tidak ada
            }
        }
        
    }
}