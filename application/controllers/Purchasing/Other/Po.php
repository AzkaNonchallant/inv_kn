<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Po extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
        $this->load->model('M_purchasing/M_other/M_po');
		$this->load->model('M_gudang_bahanbaku/M_barang');
        $this->load->model('M_purchasing/M_supplier');
	}

	public function index()
	{
		$data['result'] = $this->M_po->get()->result_array();
		$data['res_barang'] = $this->M_barang->get()->result_array();
        $data['res_supplier'] = $this->M_supplier->get()->result_array();
        $this->template->load('template', 'content/purchasing/other/po_data', $data);
	}
}