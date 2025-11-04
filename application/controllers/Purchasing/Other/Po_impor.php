<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Po_impor extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
        $this->load->model('M_purchasing/M_other/M_po_impor');

	}

	public function index()
	{
        $this->template->load('template', 'content/purchasing/other/po_impor_data');
	}
}