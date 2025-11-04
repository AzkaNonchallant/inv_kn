<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sk_barang_masuk extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		// check_not_login();
		$this->load->model('M_stock_keeper/M_sk_barang_masuk');
		$this->load->model('M_stock_keeper/M_sk_master_barang');
	}

	public function index()
	{
		// $data['row'] = $this->customer_m->get();
		$data['result'] = $this->M_sk_barang_masuk->get()->result_array();
		$data['res_barang'] = $this->M_sk_master_barang->get()->result_array();

		$this->template->load('template', 'content/stock_keeper/sk_barang_masuk', $data);
		// print_r($data);

	}

	public function add()
	{
		$data['tgl_msk'] = $this->convertDate($this->input->post('tgl_msk', TRUE));
		$data['id_sk_barang'] = $this->input->post('id_sk_barang', TRUE);
		$data['jumlah_masuk'] = $this->input->post('jumlah_masuk', TRUE);
		$data['op_sk'] = $this->input->post('op_sk', TRUE);
		$respon = $this->M_sk_barang_masuk->add($data);

		if ($respon) {
			header('location:' . base_url('Stock_keeper/Sk_barang_masuk') . '?alert=success&msg=Selamat anda berhasil menambah Barang');
		} else {
			header('location:' . base_url('Stock_keeper/Sk_barang_masuk') . '?alert=error&msg=Maaf anda gagal menambah Barang');
		}
	}
	public function update()
{
    $data['id_sk_barang_masuk'] = $this->input->post('id_sk_barang_masuk', TRUE);
    $data['tgl_msk'] = $this->convertDate($this->input->post('tgl_msk', TRUE));
    $data['id_sk_barang'] = $this->input->post('nama_barang', TRUE); // Pastikan form mengirimkan data ini dengan benar
    $data['jumlah_masuk'] = $this->input->post('jumlah_masuk', TRUE);
    $data['op_sk'] = $this->input->post('op_sk', TRUE);

    // Logging data untuk debugging
    log_message('debug', 'Data update: ' . print_r($data, true));

    $respon = $this->M_sk_barang_masuk->update($data);

    if ($respon) {
        header('location:' . base_url('Stock_keeper/Sk_barang_masuk') . '?alert=success&msg=Selamat anda berhasil meng-update Barang');
    } else {
        header('location:' . base_url('Stock_keeper/Sk_barang_masuk') . '?alert=error&msg=Maaf anda gagal meng-update Barang');
    }
}
	public function delete($id_sk_barang_masuk)
	{
		
		// $data['tgl_msk'] = $tgl_msk;
		$data['id_sk_barang_masuk'] = $id_sk_barang_masuk;
		// $data['jumlah_masuk'] = $jumlah_masuk;
		// $data['op_sk'] = $op_sk;

		$respon = $this->M_sk_barang_masuk->delete($data);

		if ($respon) {
			header('location:' . base_url('stock_keeper/sk_barang_masuk') . '?alert=success&msg=Selamat anda berhasil menghapus Barang');
		} else {
			header('location:' . base_url('stock_keeper/sk_barang_masuk') . '?alert=error&msg=Maaf anda gagal menghapus Barang');
		}
	}
	private function convertDate($date)
	{
		return explode('/', $date)[2] . "-" . explode('/', $date)[1] . "-" . explode('/', $date)[0];
	}

	public function cek_kode_barang(){
        $kode_barang = $this->input->post('kode_barang',TRUE);

        $row = $this->M_barang->cek_kode_barang($kode_barang)->row_array();
        if ($row['count_sj']==0) {
            echo "false";
        }else{
            echo "true";
        }
    }
}
