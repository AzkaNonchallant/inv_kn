<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sk_master_barang extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		// check_not_login();
		$this->load->model('M_stock_keeper/M_sk_master_barang');
	}

	public function index()
	{
		// $data['row'] = $this->customer_m->get();
		$data['result'] = $this->M_sk_master_barang->get()->result_array();
		$this->template->load('template', 'content/stock_keeper/sk_master_barang', $data);
		// print_r($data);

	}

	public function add()
	{
		$data['nama_barang'] = $this->input->post('nama_barang', TRUE);
		$data['spek'] = $this->input->post('spek', TRUE);
		$data['unit'] = $this->input->post('unit', TRUE);
		$respon = $this->M_sk_master_barang->add($data);

		if ($respon) {
			header('location:' . base_url('stock_keeper/Sk_master_barang') . '?alert=success&msg=Selamat anda berhasil menambah Barang');
		} else {
			header('location:' . base_url('stock_keeper/Sk_master_barang') . '?alert=error&msg=Maaf anda gagal menambah Barang');
		}
	}
	public function update()
	{
		$data['id_sk_barang'] = $this->input->post('id_sk_barang', TRUE);
		$data['nama_barang'] = $this->input->post('nama_barang', TRUE);
		$data['spek'] = $this->input->post('spek', TRUE);
		$data['unit'] = $this->input->post('unit', TRUE);
	
		$respon = $this->M_sk_master_barang->update($data);
		// echo $respon;
		if ($respon) {
			header('location:' . base_url('stock_keeper/Sk_master_barang') . '?alert=success&msg=Selamat anda berhasil meng-update Barang');
		} else {
			header('location:' . base_url('stock_keeper/Sk_master_barang') . '?alert=error&msg=Maaf anda gagal meng-update Barang');
		}
	}
	public function delete($id_sk_barang)
	{
		$data['id_sk_barang'] = $id_sk_barang;
		$respon = $this->M_sk_master_barang->delete($data);

		if ($respon) {
			header('location:' . base_url('stock_keeper/Sk_master_barang') . '?alert=success&msg=Selamat anda berhasil menghapus Barang');
		} else {
			header('location:' . base_url('stock_keeper/Sk_master_barang') . '?alert=error&msg=Maaf anda gagal menghapus Barang');
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
