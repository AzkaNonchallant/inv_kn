<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sk_laporan_barang_masuk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_stock_keeper/M_sk_laporan_barang_masuk');
        $this->load->model('M_stock_keeper/M_sk_barang_masuk');
    }

    public function index()
    {
        $tgl = $this->input->get('date_from');
        $tgl2 = $this->input->get('date_until');
        $name = $this->input->get('name');

        $data['result'] = $this->M_sk_laporan_barang_masuk->get($tgl, $tgl2, $name);
        $data['fil_barang'] = $this->M_sk_laporan_barang_masuk->get_filter_brng();
        $data['res_barang'] = $this->M_sk_laporan_barang_masuk->get_master_barang();

        $data['tgl'] = $tgl;
        $data['tgl2'] = $tgl2;
        $data['name'] = $name;

        $this->template->load('template', 'content/stock_keeper/sk_laporan_barang_masuk', $data);
    }

    public function pdf_sk_laporan_barang_masuk($tgl = null, $tgl2 = null, $name = null)
    {
        $mpdf = new \Mpdf\Mpdf();

        $tgl = $this->input->get('date_from');
        $tgl2 = $this->input->get('date_until');
        $name = $this->input->get('name');

        $data['result'] = $this->M_sk_laporan_barang_masuk->get($tgl, $tgl2, $name);
        $data['tgl'] = $tgl;
        $data['tgl2'] = $tgl2;
        $data['name'] = $name;

        foreach ($data['result'] as &$row) {
            $row['id_sk_barang'] = isset($row['id_sk_barang']) ? $row['id_sk_barang'] : '';
            $row['nama_barang'] = isset($row['nama_barang']) ? $row['nama_barang'] : '';
            $row['tgl_msk'] = isset($row['tgl_msk']) ? $row['tgl_msk'] : '';
            $row['jumlah_masuk'] = isset($row['jumlah_masuk']) ? $row['jumlah_masuk'] : '';
            $row['op_sk'] = isset($row['op_sk']) ? $row['op_sk'] : '';
            $row['spek'] = isset($row['spek']) ? $row['spek'] : '';
            $row['unit'] = isset($row['unit']) ? $row['unit'] : '';
            $row['satuan'] = isset($row['satuan']) ? $row['satuan'] : '';  
        }

        $d = $this->load->view('laporan/barang_masuk/page_sk_laporan_barang_masuk', $data, TRUE);
        $mpdf->AddPage("P", "", "", "", "", "15", "15", "5", "15", "", "", "", "", "", "", "", "", "", "", "", "A4");
        $mpdf->setFooter('Halaman {PAGENO}');
        $mpdf->WriteHTML($d);
        $mpdf->Output();
    }
}