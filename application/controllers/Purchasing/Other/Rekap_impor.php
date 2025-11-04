<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekap_impor extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
        $this->load->model('M_purchasing/M_other/M_rekap_impor');
        $this->load->model('M_gudang_bahanbaku/M_barang');
        $this->load->model('M_purchasing/M_supplier');

	}

	public function index()
	{
		$data['result'] = $this->M_rekap_impor->get()->result_array();
		$data['res_barang'] = $this->M_barang->get()->result_array();
        $data['res_supplier'] = $this->M_supplier->get()->result_array();
        $this->template->load('template', 'content/purchasing/other/rekap_impor_data',$data);
	}
	private function convertDate($date)
	{
		return explode('/', $date)[2] . "-" . explode('/', $date)[1] . "-" . explode('/', $date)[0];
	}

	public function add(){

		$data['id_supplier'] = $this->input->post('id_supplier',TRUE);
		$data['id_barang'] = $this->input->post('id_barang',TRUE);
		$data['no_order'] = $this->input->post('no_order',TRUE);
		$data['tgl_pib'] = $this->convertDate($this->input->post('tgl_pib', TRUE));
        $data['no_pib'] = $this->input->post('no_pib',TRUE);
        $data['spesifikasi'] = $this->input->post('spesifikasi',TRUE);
		$data['jumlah'] = $this->input->post('jumlah',TRUE);
		$data['harga_per_unit'] = $this->input->post('harga_per_unit',TRUE);
		$data['tot_value'] = $this->input->post('tot_value',TRUE);
		$data['no_invoice'] = $this->input->post('no_invoice',TRUE);
		$data['tgl_invoice'] = $this->convertDate($this->input->post('tgl_invoice', TRUE));
		$data['metode_payment'] = $this->input->post('metode_payment',TRUE);
		$data['etd'] = $this->convertDate($this->input->post('etd', TRUE));
		$data['eta'] = $this->convertDate($this->input->post('eta', TRUE));
		$data['no_bl'] = $this->input->post('no_bl',TRUE);
		$data['voyager'] = $this->input->post('voyager',TRUE);
		$data['no_voyager'] = $this->input->post('no_voyager',TRUE);
        $respon = $this->M_rekap_impor->add($data);
		if($respon){
        	header('location:'.base_url('Purchasing/Other/Rekap_impor').'?alert=success&msg=Selamat anda berhasil menambah Rekap Import');
        }else{
        	header('location:'.base_url('Purchasing/Other/Rekap_impor').'?alert=success&msg=Maaf anda gagal menambah Rekap Import');
        }
	}
	public function delete($id_rekap_import)
	{
		$data['id_rekap_import'] = $id_rekap_import;
		$respon = $this->M_rekap_impor->delete($data);

		if ($respon) {
			header('location:' . base_url('purchasing/other/rekap_impor') . '?alert=success&msg=Selamat anda berhasil menghapus Rekap Import');
		} else {
			header('location:' . base_url('purchasing/other/rekap_impor') . '?alert=error&msg=Maaf anda gagal menghapus Rekap Import');
		}
	}
}