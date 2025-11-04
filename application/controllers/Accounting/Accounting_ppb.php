    <?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class Accounting_ppb extends CI_Controller
    {
        function __construct()
        {
            parent::__construct();
            $this->load->model('M_accounting/M_accounting_ppb');
            $this->load->model('M_purchasing/M_prc_ppb/M_prc_ppb_masterbarang');
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
                $update = $this->M_accounting_ppb->approve($no_ppb_accounting, $approval_level);

                if ($update) {
                    $this->session->set_flashdata('success', 'Approval berhasil.');
            } else {
                    $this->session->set_flashdata('error', 'Approval gagal.');
                }
            } else {
                $this->session->set_flashdata('error', 'Data tidak lengkap.');
            } 

            redirect('Accounting/accounting_ppb');
        }

        // public function update_status() {
        //     // Ambil data dari form
        //     $data['id_accounting_ppb_tf'] = $this->input->post('id_accounting_ppb_tf', TRUE);

        //     $respon = $this-> M_accounting_ppb->update_status_ppb($data['id_accounting_ppb_tf'], "Approved");



        // if ($respon) {
        //     redirect('Accounting/Accounting_ppb?alert=success&msg=Status berhasil diperbarui!');
        // } else {
        //     redirect('Accounting/Accounting_ppb?alert=error&msg=Gagal memperbarui status!');
        // }
        // }

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
            $respon = $this->M_accounting_ppb->update($data);

            if ($respon) {
                redirect('Accounting/Accounting_ppb?alert=success&msg=Selamat anda berhasil meng-update Barang');
            } else {
                redirect('Accounting/Accounting_ppb?alert=error&msg=Maaf anda gagal meng-update Barang');
            }
        }

        public function index()
        {
            // Ambil data filter
            $data['tgl'] = $this->input->get('tgl') ?? null;
            $data['tgl2'] = $this->input->get('tgl2') ?? null;
            $data['fil_barang'] = $this->M_accounting_ppb->get_filter_brng();
            $data['res_barang'] = $this->M_accounting_ppb->get_master_barang();
    

            $data['nama_admin'] = $this->session->userdata('nama_admin');
            $data['result'] = $this->M_accounting_ppb->get()->result_array();
            $data['jabatan'] = $this->M_accounting_ppb->get()->result_array();
            $data['pm'] = $this->M_prc_ppb_masterbarang->get()->result_array();
            $data['name'] = 'Nama Barang yang Terpilih';

            // Load tampilan
            $this->template->load('template', 'content/accounting/accounting_ppb', $data);
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

            $respon = $this->M_accounting_ppb->add($data);
            
            if ($respon) {
                // Proses data barang
                if (is_array($data['jumlah']) && count($data['jumlah']) > 0) {
                    for ($i = 0; $i < count($data['jumlah']); $i++) {
                        $d['no_ppb_accounting'] = $data['no_ppb_accounting'];
                        $d['id_prc_master_barang'] = $data['id_prc_master_barang'][$i];
                        $d['jumlah'] = $data['jumlah'][$i];

                        $this->M_accounting_ppb->add_permintaan_barang($d);
                        // $this->M_accounting_ppb->update_status_ppb($data['id_accounting_ppb'], "Approved");
                    }
                } else {
                    log_message('error', 'Jumlah barang tidak valid atau kosong');
                }

                redirect('accounting/accounting_ppb?alert=success&msg=Selamat anda berhasil menambah Permintaan Barang Melting');
            } else {
                redirect('accounting/accounting_ppb?alert=error&msg=Maaf anda gagal menambah Permintaan Barang Melting');
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
            $data = $this->M_accounting_ppb->get_barang_detail($kode_barang);
            echo json_encode($data);
        }

        public function delete($no_ppb_accounting)
        {
            $data['no_ppb_accounting'] = str_replace('--', '/', $no_ppb_accounting);
            $respon = $this->M_accounting_ppb->delete($data);

            if ($respon) {
                header('location:' . base_url('accounting/accounting_ppb') . '?alert=success&msg=Selamat anda berhasil menghapus Permintaan Barang Melting');
            } else {
                header('location:' . base_url('accounting/accounting_ppb7') . '?alert=error&msg=Maaf anda gagal menghapus Permintaan Barang Melting');
            }
            // echo $no_transfer_slip;
        }

        public function data_ppb_barang() 
        { 
            $no_ppb_accounting = $this->input->post('no_ppb_accounting', TRUE);

            $result = $this->M_accounting_ppb->data_ppb_barang($no_ppb_accounting)->result_array();

            echo json_encode($result);
        }

        public function cek_no_ppb()
        {
            $no_ppb_accounting = $this->input->post('no_ppb_accounting', TRUE);
            $row = $this->M_accounting_ppb->cek_no_ppb($no_ppb_accounting)->row_array();

            if ($row['count_sj']==0) {
                echo "false";
            } else {
                echo "true";
            }
        }
        public function pdf_cetak($no_ppb_accounting = null)
        {
            $no_ppb_accounting = str_replace("--", "/", $no_ppb_accounting);
            $mpdf = new \Mpdf\Mpdf();

            $data['detail'] = $this->M_accounting_ppb->ambil_label($no_ppb_accounting)->result_array();

            $data['jenis_ppb'] = isset($data['detail'][0]['jenis_ppb']) ? $data['detail'][0]['jenis_ppb'] : 'Default Value';
            $data['no_ppb_accounting'] = isset($data['detail'][0]['no_ppb_accounting']) ? $data['detail'][0]['no_ppb_accounting'] : 'Default Value';
            $data['form_ppb'] = isset($data['detail'][0]['form_ppb']) ? $data['detail'][0]['form_ppb'] : 'Default Value';

            $d = $this->load->view('laporan/accounting/page_laporan_ppb', $data, TRUE);
            $mpdf->AddPage("P", "", "", "", "", "15", "15", "5", "15", "", "", "", "", "", "", "", "", "", "", "", "A4");
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