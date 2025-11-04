<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dpb extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
        $this->load->model('M_purchasing/M_other/M_dpb');

	}

	public function index()
	{
        $this->template->load('template', 'content/purchasing/other/dpb_data');
	}
}