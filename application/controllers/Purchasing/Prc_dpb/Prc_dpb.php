<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prc_dpb extends CI_Controller
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
        // Pastikan format tanggal valid sebelum diproses
        $dateParts = explode('/', $date);
        if (count($dateParts) == 3) {
            return $dateParts[2] . "-" . $dateParts[1] . "-" . $dateParts[0];
        } else {
            log_message('error', 'Tanggal tidak valid: ' . $date);
            return null; // atau set nilai default
        }
    }

    public function approve()
    {
        $no_ppb_accounting = $this->input->post('no_ppb_accounting');
        $approval_level = $this->input->post('approval_level');

        
        if ($no_ppb_accounting && $approval_level) {
            $update = $this->M_prc_dpb->approve($no_ppb_accounting, $approval_level);

            if ($update) {
                $this->session->set_flashdata('success', 'Approval berhasil.');
        } else {
                $this->session->set_flashdata('error', 'Approval gagal.');
            }
        } else {
            $this->session->set_flashdata('error', 'Data tidak lengkap.');
        } 

        redirect('Purchasing/Prc_dpb/Prc_dpb');
    }


    public function update()
    {
        $data['id_accounting_ppb'] = $this->input->post('id_accounting_ppb', TRUE);
        $data['no_ppb_accounting'] = $this->convertDate($this->input->post('no_ppb_accounting', TRUE));
        $data['departement'] = $this->input->post('departement', TRUE); 
        $data['form_ppb'] = $this->input->post('form_ppb', TRUE);
        $data['jenis_ppb'] = $this->input->post('jenis_ppb', TRUE);
        $data['tgl_ppb'] = $this->input->post('tgl_ppb', TRUE);
        $data['tgl_pakai'] = $this->input->post('tgl_pakai', TRUE);
        $data['ket'] = $this->input->post('ket', TRUE);
        $data['nama_admin'] = $this->input->post('nama_admin', TRUE);
        $data['nama_spv'] = $this->input->post('nama_spv', TRUE);
        $data['nama_manager'] = $this->input->post('nama_manager', TRUE);
        $data['nama_pm'] = $this->input->post('nama_pm', TRUE);
        $data['nama_direktur'] = $this->input->post('nama_direktur', TRUE);

        log_message('debug', 'Data update: ' . print_r($data, true));
        $respon = $this->M_prc_dpb->update($data);

        if ($respon) {
            redirect('Purchasing/Prc_dpb?alert=success&msg=Selamat anda berhasil meng-update Barang');
        } else {
            redirect('Purchasing/Prc_dpb?alert=error&msg=Maaf anda gagal meng-update Barang');
        }
    }

    public function index()
    {
        // Ambil data filter
        $data['tgl'] = $this->input->get('tgl') ?? null;
        $data['tgl2'] = $this->input->get('tgl2') ?? null;
        $data['fil_barang'] = $this->M_prc_dpb->get_filter_brng();
        $data['res_barang'] = $this->M_prc_dpb->get_master_barang();
 

        
        $data['result'] = $this->M_prc_dpb->get()->result_array();
        $data['jabatan'] = $this->M_prc_dpb->get()->result_array();
        $data['pm'] = $this->M_prc_ppb_masterbarang->get()->result_array();
        $data['name'] = 'Nama Barang yang Terpilih';

        // Load tampilan
        $this->template->load('template', 'content/purchasing/Prc_dpb/Prc_dpb', $data);
    }

    public function add()
    {
        // Ambil data dari form
        $data['id_accounting_ppb_tf'] = $this->input->post('id_accounting_ppb_tf', TRUE);
        $data['id_prc_master_barang'] = $this->input->post('id_prc_master_barang', TRUE);
        $data['no_ppb_accounting'] = $this->input->post('no_ppb_accounting', TRUE);
        $data['departement'] = $this->input->post('departement', TRUE);
        $data['form_ppb'] = $this->input->post('form_ppb', TRUE);
        $data['jenis_ppb'] = $this->input->post('jenis_ppb', TRUE);
        // Tanggal PPB, pastikan valid
        $tgl_ppb = $this->input->post('tgl_ppb', TRUE);
        if (!empty($tgl_ppb)) {
            $data['tgl_ppb'] = $this->convertDate($tgl_ppb);
        } else {
            $data['tgl_ppb'] = null; // atau set nilai default lainnya
        }

        $data['tgl_pakai'] = $this->convertDate($this->input->post('tgl_pakai', TRUE));
        $data['ket'] = $this->input->post('ket', TRUE);
        $data['nama_admin'] = $this->input->post('nama_admin', TRUE);
        $data['nama_spv'] = $this->input->post('nama_spv', TRUE);
        $data['nama_manager'] = $this->input->post('nama_manager', TRUE);
        $data['nama_pm'] = $this->input->post('nama_pm', TRUE);
        $data['nama_direktur'] = $this->input->post('nama_direktur', TRUE);

        $data['id_prc_master_barang'] = $this->input->post('id_prc_master_barang', TRUE);
        $data['jumlah'] = $this->input->post('jumlah', TRUE);

        $respon = $this->M_prc_dpb->add($data);
        
        if ($respon) {
            // Proses data barang
            if (is_array($data['jumlah']) && count($data['jumlah']) > 0) {
                for ($i = 0; $i < count($data['jumlah']); $i++) {
                    $d['no_ppb_accounting'] = $data['no_ppb_accounting'];
                    $d['id_prc_master_barang'] = $data['id_prc_master_barang'][$i];
                    $d['jumlah'] = $data['jumlah'][$i];

                    $this->M_prc_dpb->add_permintaan_barang($d);
                    // $this->M_prc_dpb->update_status_ppb($data['id_accounting_ppb'], "Approved");
                }
            } else {
                log_message('error', 'Jumlah barang tidak valid atau kosong');
            }

            redirect('purchasing/Prc_dpb?alert=success&msg=Selamat anda berhasil menambah Permintaan Barang Melting');
        } else {
            redirect('purchasing/Prc_dpb?alert=error&msg=Maaf anda gagal menambah Permintaan Barang Melting');
        }
    }

    public function get_barang_detail()
    {
        // Ambil kode barang dari query string
        $kode_barang = $this->input->get('kode_barang');

        if (!$kode_barang) {
            echo json_encode(['error' => 'Kode barang tidak valid.']);
            return;
        }

        // Ambil detail barang
        $data = $this->M_prc_dpb->get_barang_detail($kode_barang);
        echo json_encode($data);
    }

    public function delete($no_ppb_accounting)
    {
        $data['no_ppb_accounting'] = str_replace('--', '/', $no_ppb_accounting);
        $respon = $this->M_prc_dpb->delete($data);

        if ($respon) {
            header('location:' . base_url('purchasing/Prc_dpb') . '?alert=success&msg=Selamat anda berhasil menghapus Permintaan Barang Melting');
        } else {
            header('location:' . base_url('purchasing/Prc_dpb') . '?alert=error&msg=Maaf anda gagal menghapus Permintaan Barang Melting');
        }
        // echo $no_transfer_slip;
    }

    public function data_ppb_barang() 
    { 
        $no_ppb_accounting = $this->input->post('no_ppb_accounting', TRUE);

        $result = $this->M_prc_dpb->data_ppb_barang($no_ppb_accounting)->result_array();

        echo json_encode($result);
    }

    public function pdf_cetak_dpb($no_dpb = null)
{
    $no_dpb = str_replace("--", "/", $no_dpb);
    $mpdf = new \Mpdf\Mpdf();

    $data['detail'] = $this->M_prc_dpb->ambil_label($no_dpb)->result_array();
    
    

    $d = $this->load->view('laporan/prc_dpb/page_prc_dpb', $data, TRUE);
    $mpdf->AddPage("P", "", "", "", "", "15", "15", "5", "15", "", "", "", "", "", "", "", "", "", "", "A4");
    $mpdf->WriteHTML($d);
    $mpdf->Output();
}


    private function getApprovalStatus($jabatan) {
        $statusList = [
            'supervisor' => 'ACC Supervisor',
            'admin' => 'ACC Supervisor (Admin)',
            'manager' => 'ACC Manager',
            'plant_manager' => 'ACC Plant Manager',
            'direktur' => 'ACC Direktur'
        ];
        return isset($statusList[$jabatan]) ? $statusList[$jabatan] : null;
    }
    
}
?>