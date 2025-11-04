<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Avl extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
        $this->load->model('M_purchasing/M_supplier');
        $this->load->model('M_purchasing/M_other/M_avl');
	}
    private function convertDate($date)
	{
		return explode('/', $date)[2] . "-" . explode('/', $date)[1] . "-" . explode('/', $date)[0];
	}

	public function index()
	{
		$data['result'] = $this->M_avl->get()->result_array();
        $data['res_supplier'] = $this->M_supplier->get()->result_array();
        $this->template->load('template', 'content/purchasing/other/avl_data', $data);
	}
    public function add()
	{
        $data['id_supplier'] = $this->input->post('id_supplier', TRUE);
        $data['periode'] = $this->convertDate($this->input->post('periode', TRUE));
        $data['berlaku'] = $this->convertDate($this->input->post('berlaku', TRUE));
        $respon = $this->M_avl->add($data);

        if($respon){
        	header('location:'.base_url('purchasing/other/avl').'?alert=success&msg=Selamat anda berhasil menambah supplier');
        }else{
        	header('location:'.base_url('purchasing/other/avl').'?alert=success&msg=Maaf anda gagal menambah supplier');
        }
	}
	public function pdf_hasil($kode_supplier = null)
    {
        $kode_supplier = str_replace("--", "/", $kode_supplier);
        $mpdf = new \Mpdf\Mpdf();

        $data['detail'] = $this->M_avl->ambil_avl($kode_supplier)->result_array();

        $d = $this->load->view('laporan/avl/page_hasil', $data, TRUE);
        $mpdf->AddPage("L", "", "", "", "", "15", "15", "5", "15", "", "", "", "", "", "", "", "", "", "", "", "A4");
        $mpdf->WriteHTML($d);
        $mpdf->Output();
    }
	public function delete($id_avl)
	{
		$data['id_avl'] = $id_avl;
        $respon = $this->M_avl->delete($data);

        if($respon){
        	header('location:'.base_url('purchasing/other/avl').'?alert=success&msg=Selamat anda berhasil menghapus supplier');
        }else{
        	header('location:'.base_url('purchasing/other/avl').'?alert=success&msg=Maaf anda gagal menghapus supplier');
        }
	}
}