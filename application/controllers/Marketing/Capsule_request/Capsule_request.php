<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Capsule_request extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		// check_not_login();
		$this->load->model('M_marketing/M_capsule_request');
		$this->load->model('M_marketing/M_customer');
		$this->load->model('M_marketing/M_kode_warna');
	}

	public function index()
	{
		// $data['row'] = $this->customer_m->get();
		$data['result'] = $this->M_capsule_request->get()->result_array();
		$data['res_kodewarna_cap'] = $this->M_kode_warna->getcap()->result_array();
		$data['res_kodewarna_body'] = $this->M_kode_warna->getbody()->result_array();
		$data['res_customer'] = $this->M_customer->get()->result_array();
		$this->template->load('template', 'content/marketing/capsule_request/cr_data', $data);
		// print_r($data);

	}

	public function add()
	{
		$data['tgl_cr'] = $this->convertDate($this->input->post('tgl_cr', TRUE));
		$data['no_mcr'] = $this->input->post('no_mcr', TRUE);
		$data['nama_operator'] = $this->input->post('nama_operator', TRUE);
		$data['no_cr'] = $this->input->post('no_cr', TRUE);
		$data['size'] = $this->input->post('size', TRUE);
		$data['print'] = $this->input->post('print', TRUE);
		$data['tinta'] = $this->input->post('tinta', TRUE);
		$data['gravurol'] = $this->input->post('gravurol', TRUE);
		$data['id_customer'] = $this->input->post('id_customer', TRUE);
		$data['id_kw_cap'] = $this->input->post('id_kw_cap', TRUE);
		$data['id_kw_body'] = $this->input->post('id_kw_body', TRUE);
		$data['qty_cr'] = $this->input->post('qty_cr', TRUE);
		$data['jenis_box'] = $this->input->post('jenis_box', TRUE);
		$data['jenis_zak'] = $this->input->post('jenis_zak', TRUE);
		$data['delivery'] = $this->convertDate($this->input->post('delivery', TRUE));

		$respon = $this->M_capsule_request->add_mcr($data);

		if ($respon) {
			for ($i = 0; $i < count($data['no_cr']); $i++)   {
			// echo $data['qty'][$i]."<br>";
				$d['tgl_cr'] = $data['tgl_cr'];
				$d['no_mcr'] = $data['no_mcr'];
				$d['no_cr'] = $data['no_cr'][$i];
				$d['size'] = $data['size'][$i];
				$d['print'] = $data['print'][$i];
				$d['tinta'] = $data['tinta'][$i];
				$d['gravurol'] = $data['gravurol'][$i];
				$d['id_customer'] = $data['id_customer'][$i];
				$d['id_kw_cap'] = $data['id_kw_cap'][$i];
				$d['id_kw_body'] = $data['id_kw_body'][$i];
				$d['qty_cr'] = $data['qty_cr'][$i];
				$d['jenis_box'] = $data['jenis_box'][$i];
				$d['jenis_zak'] = $data['jenis_zak'][$i];
				$d['delivery'] = $data['delivery'][$i];

				$respon = $this->M_capsule_request->add($d);
				}
			header('location:' . base_url('Marketing/Capsule_request/Capsule_request') . '?alert=success&msg=Selamat anda berhasil menambah Schedule Marketing');
		} else {
			header('location:' . base_url('Marketing/Capsule_request/Capsule_request') . '?alert=error&msg=Maaf anda gagal menambah Schedule Marketing');
		}
	}

	public function update()
	{
		$data['id_sch'] = $this->input->post('id_sch', TRUE);
		$data['id_customer'] = $this->input->post('id_customer', TRUE);
		$data['id_kw_cap'] = $this->input->post('id_kw_cap', TRUE);
		$data['id_kw_body'] = $this->input->post('id_kw_body', TRUE);
		$data['no_cr'] = $this->input->post('no_cr', TRUE);
		$data['no_batch'] = $this->input->post('no_batch', TRUE);
		$data['tgl_sch'] = $this->convertDate($this->input->post('tgl_sch', TRUE));
		$data['size'] = $this->input->post('size', TRUE);
		$data['mesin'] = $this->input->post('mesin', TRUE);
		$data['jumlah'] = $this->input->post('jumlah', TRUE);
		$data['sisa'] = $this->input->post('sisa', TRUE);
		$data['cek_print'] = $this->input->post('cek_print', TRUE);
		$data['print'] = $this->input->post('print', TRUE);
		$data['tinta'] = $this->input->post('tinta', TRUE);
		$data['jenis_box'] = $this->input->post('jenis_box', TRUE);
		$data['jenis_zak'] = $this->input->post('jenis_zak', TRUE);
		$data['minyak'] = $this->input->post('minyak', TRUE);
		$data['tgl_kirim'] = $this->convertDate($this->input->post('tgl_kirim', TRUE));
		$data['tgl_prd'] = $this->convertDate($this->input->post('tgl_prd', TRUE));
		$data['keterangan'] = $this->input->post('keterangan', TRUE);
		$respon = $this->M_tambah_schedule->update($data);
		if ($respon) {
			header('location:' . base_url('Marketing/Tambah_schedule') . '?alert=success&msg=Selamat anda berhasil meng-update Schedule Marketing');
		} else {
			header('location:' . base_url('Marketing/Tambah_schedule') . '?alert=error&msg=Maaf anda gagal meng-update Schedule Marketing');
		}
	}

	public function cek_no_cr()
	{
		$no_cr = $this->input->post('no_cr', TRUE);

		$row = $this->M_tambah_schedule->cek_no_cr($no_cr)->row_array();
		if ($row['count_cr'] == 0) {
			echo "false";
		} else {
			echo "true";
		}
	}

	public function delete($no_mcr)
	{
		$data['no_mcr'] = str_replace('--', '/', $no_mcr);
		$respon = $this->M_capsule_request->delete($data);

		if ($respon) {
			header('location:' . base_url('Marketing/Capsule_request/Capsule_request') . '?alert=success&msg=Selamat anda berhasil menghapus Capsule Request');
		} else {
			header('location:' . base_url('Marketing/Capsule_request/Capsule_request') . '?alert=error&msg=Maaf anda gagal menghapus Capsule Request');
		}
	}
	private function convertDate($date)
	{
		return explode('/', $date)[2] . "-" . explode('/', $date)[1] . "-" . explode('/', $date)[0];
	}
}
