<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_stock extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_marketing/M_master_stok');
    }

    public function index() {
        $data['stok'] = $this->M_master_stok->get_all();
        $data['title'] = 'Master Stock Size';
        
        // Cara 1: Jika template library membutuhkan parameter berbeda
        $this->template->load('template', 'content/marketing/stock_size/master_stock_size_data', $data);
        
        // Atau Cara 2: Jika menggunakan cara standard CI
        // $this->load->view('content/marketing/stock_size/master_stock_size_data', $data);
    }

    public function tambah() {
        if ($this->input->post()) {
            // Validasi input
            $this->form_validation->set_rules('stok_bulan', 'Stok Bulan', 'required|numeric');
            $this->form_validation->set_rules('tahun_stok', 'Tahun Stok', 'required|numeric');
            
            if ($this->form_validation->run() == TRUE) {
                $data = [
                    'stok_bulan' => $this->input->post('stok_bulan'),
                    'tahun_stok' => $this->input->post('tahun_stok'),
                    'id_user' => $this->session->userdata('id_user') ?? 1,
                    'created_by' => $this->session->userdata('id_user') ?? 1,
                    'created_at' => date('Y-m-d H:i:s')
                ];
                
                // Cek duplikat data
                if (!$this->M_master_stok->check_duplicate($data['stok_bulan'], $data['tahun_stok'])) {
                    if ($this->M_master_stok->insert($data)) {
                        $this->session->set_flashdata('success', 'Data berhasil ditambahkan!');
                    } else {
                        $this->session->set_flashdata('error', 'Gagal menambahkan data!');
                    }
                } else {
                    $this->session->set_flashdata('error', 'Data untuk bulan dan tahun tersebut sudah ada!');
                }
            } else {
                $this->session->set_flashdata('error', validation_errors());
            }
        }
        redirect('marketing/master/master_stock');
    }

    public function hapus($id) {
        if ($this->M_master_stok->delete($id)) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus data!');
        }
        redirect('marketing/master/master_stock');
    }
}