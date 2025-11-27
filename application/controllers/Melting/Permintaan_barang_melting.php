<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Permintaan_barang_melting extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        // check_not_login();
        $this->load->model('M_melting/M_permintaan_barang_melting');
        $this->load->model('M_gudang_bahanbaku/M_permintaan_barang_gudang');
        $this->load->model('M_gudang_bahanbaku/M_barang_masuk');
        $this->load->model('M_users/M_users');
        $this->load->model('M_lab/M_pemeriksaan_bahan');
        $this->load->model("M_adm_barang_masuk/M_adm_barang_masuk");
    }
    private function convertDate($date)
    {
        return explode('/', $date)[2] . "-" . explode('/', $date)[1] . "-" . explode('/', $date)[0];
    }
    public function index()
    {
        // $data['row'] = $this->customer_m->get();
        $data['result'] = $this->M_permintaan_barang_melting->get1()->result_array();
        $data['no_urut'] = $this->M_permintaan_barang_melting->generate_no_urut();
        

        $this->template->load('template', 'content/melting/permintaan_barang_melting/permintaan_barang_melting_data', $data);
        // print_r($data['bm']);
    }
   
    public function cek_transfer_slip()
    {
        $no_transfer_slip = $this->input->post('no_transfer_slip', TRUE);

        $row = $this->M_permintaan_barang_melting->cek_transfer_slip($no_transfer_slip)->row_array();
        if ($row['count_sj'] == 0) {
            echo "false";
        } else {
            echo "true";
        }
    }

    public function get_by_kode_ts() {
        $kode_ts = $this->input->post('kode_ts', TRUE);
        $result = $this->M_adm_barang_masuk->get_by_kode_ts($kode_ts);

        echo json_encode($result);
    }

    public function get_by_no_urut() {
        $no_urut = $this->input->post('no_urut', TRUE);
        $result = $this->M_permintaan_barang_melting->get_by_no_urut($no_urut);

        echo json_encode($result);
    }

    public function add()
    {
        $data['no_urut'] = $this->input->post('no_urut', TRUE);
        $data['tgl_permintaan'] = $this->convertDate($this->input->post('tgl_permintaan', TRUE));
        $data['id_adm_bm'] = $this->input->post('id_adm_bm', TRUE);
        $data['id_prc_master_barang'] = $this->input->post('id_prc_master_barang', TRUE);
        $data['jml_permintaan'] = $this->input->post('jml_permintaan', TRUE);

        // print_r($data['no_batch']);

        // echo $data['tgl'];
        $respon = $this->M_permintaan_barang_melting->add_transfer_slip($data);


        if ($respon) {
            for ($i = 0; $i < count($data['id_prc_master_barang']); $i++) {
                // echo $data['qty'][$i]."<br>";
                $d['no_urut'] = $data['no_urut'];
                $d['id_adm_bm'] = $data['id_adm_bm'][$i];
                $d['id_prc_master_barang'] = $data['id_prc_master_barang'][$i];
                $d['jml_permintaan'] = $data['jml_permintaan'][$i];

                $respon = $this->M_permintaan_barang_melting->add_permintaan_barang($d);
            }
            header('location:' . base_url('melting/permintaan_barang_melting') . '?alert=success&msg=Selamat anda berhasil menambah Permintaan Barang Melting');
        } else {
            header('location:' . base_url('melting/permintaan_barang_melting') . '?alert=error&msg=Maaf anda gagal menambah Permintaan Barang Melting');
        }
    }

    public function disetujui()
    {
        $no_transfer_slip = $this->input->post('no_transfer_slip', TRUE);
        $tgl_rilis = $this->convertDate($this->input->post('tgl_rilis', TRUE));
        // $data['id_barang_masuk'] = $this->input->post('id_barang_masuk', TRUE);
        // $data['qty'] = $this->input->post('qty', TRUE);
        // var_dump($data);
        // die;
        $data = $this->M_permintaan_barang_gudang->data_permintaan_barang($no_transfer_slip)->result_array();
        foreach ($data as $k => $value) {
            $per_barang = array('id_barang_masuk' => $value['id_barang_masuk'], 'qty' => $value['qty']);
            $this->M_barang_masuk->update_stok($per_barang);
            $id_mm = $this->M_permintaan_barang_gudang->add_approv($data[$k], $tgl_rilis);
            $id_barang_keluar = $this->M_permintaan_barang_gudang->add_approv2($data[$k], $tgl_rilis);
            $this->M_transaksi_melting->trans_masuk(array('id_mm' => $id_mm, 'qty' => $value['qty']));
        }
        $this->M_permintaan_barang_gudang->disetujui($no_transfer_slip, $tgl_rilis);
        $respon = $this->M_permintaan_barang_gudang->update_status_ts($no_transfer_slip, "DiSetujui");


        if ($respon) {
            header('location:' . base_url('melting/Permintaan_barang_melting') . '?alert=success&msg=Selamat anda berhasil Menyetujui Permintaan Barang Gudang');
        } else {
            header('location:' . base_url('melting/Permintaan_barang_melting') . '?alert=error&msg=Maaf anda gagal Menyetujui Permintaan Barang Gudang');
        }
    }

    public function update()
    {
        $data['no_urut'] = $this->input->post('no_urut', TRUE);
        $data['tgl_permintaan'] = $this->convertDate($this->input->post('tgl_permintaan', TRUE));
        $data['id_prc_master_barang'] = $this->input->post('id_prc_master_barang', TRUE);
        $data['jml_permintaan'] = $this->input->post('jml_permintaan', TRUE);
        $data['id_adm_bm'] = $this->input->post('id_adm_bm', TRUE);
        $respon = $this->M_permintaan_barang_melting->update($data);

        $this->M_permintaan_barang_melting->delete_barang($data);

        if ($respon) {
            for ($i = 0; $i < count($data['id_prc_master_barang']); $i++) {
                // echo $data['qty'][$i]."<br>";
                $d['no_urut'] = $data['no_urut'];
                $d['id_adm_bm'] = $data['id_adm_bm'][$i] ?? null;
                $d['id_prc_master_barang'] = $data['id_prc_master_barang'][$i] ?? null;
                $d['jml_permintaan'] = $data['jml_permintaan'][$i] ?? null;

                $this->M_permintaan_barang_melting->add_permintaan_barang($d);
            }
            header('location:' . base_url('melting/permintaan_barang_melting') . '?alert=success&msg=Selamat anda berhasil mengupdate Permintaan Barang Melting');
        } else {
            header('location:' . base_url('melting/permintaan_barang_melting') . '?alert=error&msg=Maaf anda gagal mengupdate Permintaan Barang Melting');
        }
    }
    public function delete($no_urut)
    {
        $respon = $this->M_permintaan_barang_melting->delete($no_urut);

        if ($respon) {
            header('location:' . base_url('melting/permintaan_barang_melting') . '?alert=success&msg=Selamat anda berhasil menghapus Permintaan Barang Melting');
        } else {
            header('location:' . base_url('melting/permintaan_barang_melting') . '?alert=error&msg=Maaf anda gagal menghapus Permintaan Barang Melting');
        }
        // echo $no_transfer_slip;
    }
}
