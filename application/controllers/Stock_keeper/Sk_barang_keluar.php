<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sk_barang_keluar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // check_not_login();
        $this->load->model('M_stock_keeper/M_sk_barang_keluar');
        $this->load->model('M_stock_keeper/M_sk_master_barang');
    }



    public function index()
    {
        $data['result'] = $this->M_sk_barang_keluar->get()->result_array();
        $data['res_barang'] = $this->M_sk_master_barang->get()->result_array();

        $this->template->load('template', 'content/stock_keeper/sk_barang_keluar', $data);
    }

    /**
     * Menambahkan data barang keluar dengan validasi stok.
     */
    public function add()
    {
        $id_barang = $this->input->post('id_sk_barang', TRUE);
        $jumlah_keluar = $this->input->post('jumlah_keluar', TRUE);

        // Ambil stok saat ini dari model
        $stok_sekarang = $this->M_sk_master_barang->get_stock_by_id($id_barang);

        // Validasi stok
        if ($stok_sekarang < $jumlah_keluar) {
            $this->redirect_with_message(
                FALSE,
                '',
                'Stok tidak mencukupi!'
            );
            return;
        }
        
        // Jika stok mencukupi, simpan data barang keluar
        $data = [
            'tgl_keluar'    => $this->convertDate($this->input->post('tgl_keluar', TRUE)),
            'id_sk_barang'  => $id_barang,
            'jumlah_keluar' => $jumlah_keluar,
            'op_sk'         => $this->input->post('op_sk', TRUE),
        ];

        $respon = $this->M_sk_barang_keluar->add($data);

        // Redirect dengan pesan sesuai hasil insert
        $this->redirect_with_message(
            $respon,
            'Barang berhasil ditambahkan!',
            'Barang gagal ditambahkan!'
        );
    }

    /**
     * Memperbarui data barang keluar.
     */
    public function update()
    {
        $data = [
            'id_sk_barang_keluar' => $this->input->post('id_sk_barang_keluar', TRUE),
            'tgl_keluar'          => $this->convertDate($this->input->post('tgl_keluar', TRUE)),
            'id_sk_barang'        => $this->input->post('id_sk_barang', TRUE),
            'jumlah_keluar'       => $this->input->post('jumlah_keluar', TRUE),
            'op_sk'               => $this->input->post('op_sk', TRUE),
        ];

        $respon = $this->M_sk_barang_keluar->update($data);

        $this->redirect_with_message(
            $respon,
            'Barang berhasil di-update!',
            'Barang gagal di-update!'
        );
    }

    /**
     * Menghapus data barang keluar.
     * @param int $id_sk_barang_keluar
     */
    public function delete($id_sk_barang_keluar)
    {
        $respon = $this->M_sk_barang_keluar->delete($id_sk_barang_keluar);

        $this->redirect_with_message(
            $respon,
            'Barang berhasil dihapus!',
            'Barang gagal dihapus!'
        );
    }

    /**
     * Fungsi untuk mengonversi tanggal dari format dd/mm/yyyy ke yyyy-mm-dd.
     * @param string $date
     * @return string
     */
    private function convertDate($date)
    {
        $date_parts = explode('/', $date);
        return $date_parts[2] . '-' . $date_parts[1] . '-' . $date_parts[0];
    }

    /**
     * Mengalihkan halaman dengan pesan sukses atau error.
     * @param bool $respon
     * @param string $success_msg
     * @param string $error_msg
     */
    private function redirect_with_message($respon, $success_msg, $error_msg)
    {
        $alert_type = $respon ? 'success' : 'error';
        $message = $respon ? $success_msg : $error_msg;
        header('location:' . base_url('Stock_keeper/Sk_barang_keluar') . "?alert=$alert_type&msg=$message");
        exit();
    }


    /**
     * Menampilkan halaman utama barang keluar.
     */
    // public function index()
    // {
    //     $data['result'] = $this->M_sk_barang_keluar->get()->result_array();
    //     $data['res_barang'] = $this->M_sk_master_barang->get()->result_array();

    //     $this->template->load('template', 'content/stock_keeper/sk_barang_keluar', $data);
    // }

    // /**
    //  * Menambahkan data barang keluar.
    //  */
    // public function add()
    // {
    //     $data = [
    //         'tgl_keluar'   => $this->convertDate($this->input->post('tgl_keluar', TRUE)),
    //         'id_sk_barang' => $this->input->post('id_sk_barang', TRUE),
    //         'jumlah_keluar'       => $this->input->post('jumlah_keluar', TRUE),
    //         'op_sk'        => $this->input->post('op_sk', TRUE),
    //     ];

    //     $respon = $this->M_sk_barang_keluar->add($data);

    //     $this->redirect_with_message(
    //         $respon,
    //         'Barang berhasil ditambahkan!',
    //         'Barang gagal ditambahkan!'
    //     );
    // }

    // /**
    //  * Memperbarui data barang keluar.
    //  */
    // public function update()
    // {
    //     $data = [
    //         'id_sk_barang_keluar' => $this->input->post('id_sk_barang_keluar', TRUE),
    //         'tgl_keluar'          => $this->convertDate($this->input->post('tgl_keluar', TRUE)),
    //         'id_sk_barang'        => $this->input->post('nama_barang', TRUE),
    //         'jumlah_keluar'              => $this->input->post('jumlah_keluar', TRUE),
    //         'op_sk'               => $this->input->post('op_sk', TRUE),
    //     ];

    //     // Logging data untuk debugging
    //     log_message('debug', 'Data update: ' . print_r($data, true));

    //     $respon = $this->M_sk_barang_keluar->update($data);

    //     $this->redirect_with_message(
    //         $respon,
    //         'Barang berhasil di-update!',
    //         'Barang gagal di-update!'
    //     );
    // }

    // /**
    //  * Menghapus data barang keluar.
    //  * @param int $id_sk_barang_keluar
    //  */
    // public function delete($id_sk_barang_keluar)
    // {
    //     $data = ['id_sk_barang_keluar' => $id_sk_barang_keluar];

    //     $respon = $this->M_sk_barang_keluar->delete($data);

    //     $this->redirect_with_message(
    //         $respon,
    //         'Barang berhasil dihapus!',
    //         'Barang gagal dihapus!'
    //     );
    // }

    // /**
    //  * Fungsi untuk mengonversi tanggal dari format dd/mm/yyyy ke yyyy-mm-dd.
    //  * @param string $date
    //  * @return string
    //  */
    // private function convertDate($date)
    // {
    //     $date_parts = explode('/', $date);
    //     return $date_parts[2] . '-' . $date_parts[1] . '-' . $date_parts[0];
    // }

    // /**
    //  * Mengalihkan halaman dengan pesan sukses atau error.
    //  * @param bool $respon
    //  * @param string $success_msg
    //  * @param string $error_msg
    //  */
    // private function redirect_with_message($respon, $success_msg, $error_msg)
    // {
    //     $alert_type = $respon ? 'success' : 'error';
    //     $message = $respon ? $success_msg : $error_msg;
    //     header('location:' . base_url('Stock_keeper/Sk_barang_keluar') . "?alert=$alert_type&msg=$message");
    // }

    // /**
    //  * Mengecek apakah kode barang valid.
    //  */
    // public function cek_kode_barang()
    // {
    //     $kode_barang = $this->input->post('kode_barang', TRUE);
    //     $row = $this->M_barang->cek_kode_barang($kode_barang)->row_array();

    //     echo ($row['count_sj'] == 0) ? "false" : "true";
    // }
}
