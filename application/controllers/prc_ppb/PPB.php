<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PPB extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
        $this->load->model('M_ppb/M_ppb');

	}

	public function index()
	{
        $this->template->load('template', 'content/ppb/ppb_data');
	}
}