<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prc_po_rekap extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_purchasing/M_po_rekap/M_prc_po_rekap');
        $this->load->model('M_purchasing/M_po_import/M_prc_po_import');
    }

    // Fungsi untuk mengambil nomor order yang baru
    public function getNextOrderNumber()
    {
        $last_order = $this->M_prc_po_rekap->getLastOrderNumber();

        // Jika tidak ada nomor order yang ditemukan
        if ($last_order === null) {
            log_message('error', 'No last order number found or query failed');
            return 'KN-001';  // Mengembalikan nomor order default
        }

        // Ambil nomor terakhir dan hitung nomor baru
        $last_number = (int) substr($last_order, 3);  // Ambil nomor setelah 'KN-'
        $new_number = 'KN-' . str_pad($last_number + 1, 3, '0', STR_PAD_LEFT);

        return $new_number;
    }

    public function index()
    {
        // Ambil nomor order baru
        $new_order_number = $this->getNextOrderNumber();

        // Ambil data lainnya dari model
        $data['result'] = $this->M_prc_po_rekap->get()->result_array();
        $data['res_rekap'] = $this->M_prc_po_rekap->get_rekap()->result_array();
        $data['new_order_number'] = $new_order_number;

        // Load template dan view
        $this->template->load('template', 'content/purchasing/po_rekap/prc_po_rekap', $data);
    }

    public function add()
    {
        // Ambil nomor order terbaru
        $data['no_order'] = $this->getNextOrderNumber();

        // Ambil data lainnya dari form
        $data['id_prc_po_import'] = $this->input->post('id_prc_po_import', TRUE);
        $data['tgl_pib'] = $this->convertDate($this->input->post('tgl_pib', TRUE));  
        $data['no_pib'] = $this->input->post('no_pib', TRUE);
        $data['no_invoice'] = $this->input->post('no_invoice', TRUE);
        $data['tgl_invoice'] = $this->convertDate($this->input->post('tgl_invoice', TRUE));
        $data['tgl_etd'] = $this->convertDate($this->input->post('tgl_etd', TRUE));
        $data['tgl_eta'] = $this->convertDate($this->input->post('tgl_eta', TRUE));
        $data['no_bl'] = $this->input->post('no_bl', TRUE);
        $data['voyager'] = $this->input->post('voyager', TRUE);
        $data['no_voyager'] = $this->input->post('no_voyager', TRUE);
        $data['prc_admin'] = $this->input->post('prc_admin', TRUE);
        $data['jumlah'] = $this->input->post('jumlah', TRUE);
        $data['harga_perunit'] = $this->input->post('harga_perunit', TRUE);
        $data['total_harga'] = $this->input->post('total_harga', TRUE);
        $data['metode'] = $this->input->post('metode', TRUE);
        $data['spek'] = $this->input->post('spek', TRUE);
        $data['nama_po_supplier'] = $this->input->post('nama_po_supplier', TRUE);
        $data['nama_barang'] = $this->input->post('nama_barang', TRUE);
        $data['status'] = $this->input->post('status', TRUE);

        // Kirim data ke model untuk ditambahkan ke database
        $respon = $this->M_prc_po_rekap->add($data);

        // Redirect berdasarkan hasil operasi
        if ($respon) {
            header('location:' . base_url('Purchasing/Po_rekap/Prc_po_rekap') . '?alert=success&msg=Selamat anda berhasil menambah Barang');
        } else {
            header('location:' . base_url('Purchasing/Po_rekap/Prc_po_rekap') . '?alert=error&msg=Maaf anda gagal menambah Barang');
        }
    }

    public function update()
    {
        // Mengambil data dari form untuk update
        $data['id_prc_po_import'] = $this->input->post('id_prc_po_import', TRUE);
        $data['id_prc_rekap_import'] = $this->input->post('id_prc_rekap_import', TRUE);
        $data['no_po_import'] = $this->input->post('no_po_import', TRUE);
        $data['no_order'] = $this->input->post('no_order', TRUE);
        $data['tgl_pib'] = $this->convertDate($this->input->post('tgl_pib', TRUE));  
        $data['no_pib'] = $this->input->post('no_pib', TRUE);
        $data['no_invoice'] = $this->input->post('no_invoice', TRUE);
        $data['tgl_invoice'] = $this->convertDate($this->input->post('tgl_invoice', TRUE));
        $data['tgl_etd'] = $this->convertDate($this->input->post('tgl_etd', TRUE));
        $data['tgl_eta'] = $this->convertDate($this->input->post('tgl_eta', TRUE));
        $data['no_bl'] = $this->input->post('no_bl', TRUE);
        $data['voyager'] = $this->input->post('voyager', TRUE);
        $data['no_voyager'] = $this->input->post('no_voyager', TRUE);
        $data['prc_admin'] = $this->input->post('prc_admin', TRUE);
        $data['jumlah'] = $this->input->post('jumlah', TRUE);
        $data['harga_perunit'] = $this->input->post('harga_perunit', TRUE);
        $data['total_harga'] = $this->input->post('total_harga', TRUE);
        $data['metode'] = $this->input->post('metode', TRUE);
        $data['spek'] = $this->input->post('spek', TRUE);
        $data['nama_po_supplier'] = $this->input->post('nama_po_supplier', TRUE);
        $data['nama_barang'] = $this->input->post('nama_barang', TRUE);

        $respon = $this->M_prc_po_rekap->update($data);

        if ($respon) {
            header('location:' . base_url('Purchasing/Po_rekap/Prc_po_rekap') . '?alert=success&msg=Selamat anda berhasil mengedit Barang');
        } else {
            header('location:' . base_url('Purchasing/Po_rekap/Prc_po_rekap') . '?alert=error&msg=Maaf anda gagal mengedit Barang');
        }
    }

    public function upt() {
        $data['id_prc_rekap_import'] = $this->input->post('id_prc_rekap_import', TRUE);
        $data['status'] = $this->input->post('status', TRUE);

        $respon = $this->M_prc_po_rekap->update_status($data);

        if ($respon) {
            header('location:' . base_url('Purchasing/Po_rekap/Prc_po_rekap') . '?alert=success&msg=Selamat anda berhasil mengedit Barang');
        } else {
            header('location:' . base_url('Purchasing/Po_rekap/Prc_po_rekap') . '?alert=error&msg=Maaf anda gagal mengedit Barang');
        }
    }

    public function delete($id_prc_rekap_import)
    {
        $data['id_prc_rekap_import'] = $id_prc_rekap_import;
        $respon = $this->M_prc_po_rekap->delete($data);

        if ($respon) {
            header('location:' . base_url('Purchasing/po_rekap/Prc_po_rekap/') . '?alert=success&msg=Selamat anda berhasil menghapus Barang');
        } else {
            header('location:' . base_url('Purchasing/po_rekap/Prc_po_rekap/') . '?alert=error&msg=Maaf anda gagal menghapus Barang');
        }
    }

    private function convertDate($date)
    {
        return explode('/', $date)[2] . "-" . explode('/', $date)[1] . "-" . explode('/', $date)[0];
    }
}