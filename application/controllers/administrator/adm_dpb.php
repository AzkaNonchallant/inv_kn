<?php
defined('BASEPATH') or exit('No direct script access allowed');

class adm_dpb extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_purchasing/M_prc_dpb/M_prc_dpb');
        $this->load->model('M_purchasing/M_prc_ppb/M_prc_ppb_masterbarang');
        $this->load->model('M_purchasing/M_purchasing_ppb/M_purchasing_ppb');
        $this->load->library('form_validation');
    }

    private function convertDate($date)
    {
        $dateParts = explode('/', $date);
        if (count($dateParts) == 3) {
            return $dateParts[2] . "-" . $dateParts[1] . "-" . $dateParts[0];
        } else {
            log_message('error', 'Tanggal tidak valid: ' . $date);
            return null;
        }
    }

    public function index()
    {
        $tgl = $this->input->get('date_from');
        $tgl2 = $this->input->get('date_until');
        $data['result'] = $this->M_prc_dpb->get()->result_array();
        $data['res_rb'] = $this->M_prc_dpb->get_rb()->result_array();
        $data['res_kode'] = $this->M_prc_dpb->get()->result_array();
        $data['generate_no_dpb'] = $this->M_prc_dpb->generate_no_dpb();
        $data['tgl'] = $tgl;
        $data['tgl2'] = $tgl2;

        $this->template->load('template', 'content/administrator/dpb/adm_dpb_data', $data);
    }

    public function get_dpb_detail()
    {
        $no_dpb = $this->input->post('no_dpb', TRUE);
        $result = $this->M_prc_dpb->get_dpb_detail($no_dpb);
        echo json_encode($result);
    }

    public function get_by_no_rb()
    {
        $no_rb = $this->input->post('no_rb', TRUE);
        $result = $this->M_prc_dpb->data_no_budget($no_rb);
        echo json_encode($result);
    }

    public function add()
    {
        $data['no_dpb'] = $this->input->post('no_dpb', TRUE);
        $data['no_batch'] = $this->input->post('no_batch', TRUE);
        
        // Ambil data dari DPB yang dipilih
        $dpb_detail = $this->M_prc_dpb->get_dpb_detail($data['no_dpb']);
        
        if (!empty($dpb_detail)) {
            $data['tgl_dpb'] = $dpb_detail[0]['tgl_dpb'];
            $data['jenis_bayar'] = $dpb_detail[0]['jenis_bayar'];
            $data['no_sjl'] = $dpb_detail[0]['no_sjl'];
            
            // Simpan data
            $result = $this->M_prc_dpb->add($data);
            
            if ($result) {
                header('location:' . base_url('purchasing/prc_dpb/prc_dpb') . '?alert=success&msg=Selamat anda berhasil menambahkan Data DPB');
            } else {
                header('location:' . base_url('purchasing/prc_dpb/prc_dpb') . '?alert=error&msg=Maaf anda gagal menambahkan Data DPB');
            }
        } else {
            header('location:' . base_url('purchasing/prc_dpb/prc_dpb') . '?alert=error&msg=Data DPB tidak ditemukan');
        }
    }

    public function delete($no_dpb)
    {
        $respon = $this->M_prc_dpb->delete($no_dpb);
        if($respon) {
             header('location:' . base_url('purchasing/prc_dpb/prc_dpb') . '?alert=success&msg=Selamat anda berhasil menghapus Data DPB');
        }else {
            header('location:' . base_url('purchasing/prc_dpb/prc_dpb') . '?alert=error&msg=Maaf anda gagal menghapus Data DPB');
        }
    }
}
?>