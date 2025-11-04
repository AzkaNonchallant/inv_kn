<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_sk_barang_masuk extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function id_user()          
    {
        return $this->session->userdata("id_user");
    }

    public function get($id = null)
    {
        $sql = " 
        SELECT a.*, b.nama_barang, b.spek, b.unit 
        FROM tb_sk_barang_masuk a
        LEFT JOIN tb_sk_masterbarang b ON a.id_sk_barang = b.id_sk_barang
        WHERE a.is_deleted = 0 ORDER BY a.tgl_msk ASC";

        return $this->db->query($sql);
    }

    public function add($data)
    {
        $id_user = $this->id_user();
        $sql = "
        INSERT INTO tb_sk_barang_masuk (id_sk_barang, tgl_msk, jumlah_masuk, op_sk, created_at, created_by, updated_at, updated_by, is_deleted) 
        VALUES ('$data[id_sk_barang]', '$data[tgl_msk]', '$data[jumlah_masuk]', '$data[op_sk]', NOW(), '$id_user', '0000-00-00 00:00:00', '', '0')";

        return $this->db->query($sql);
    }

    public function update($data)
    {
        $id_user = $this->id_user();
        $sql = "
        UPDATE tb_sk_barang_masuk 
        SET tgl_msk = '$data[tgl_msk]', 
            id_sk_barang = '$data[id_sk_barang]', 
            jumlah_masuk = '$data[jumlah_masuk]', 
            op_sk = '$data[op_sk]', 
            updated_at = NOW(), 
            updated_by = '$id_user' 
        WHERE id_sk_barang_masuk = '$data[id_sk_barang_masuk]'";

        // Logging query untuk debugging
        log_message('debug', 'Query update: ' . $this->db->last_query());
        
        return $this->db->query($sql);
    }

    public function delete($data)
    {
        $this->db->where('id_sk_barang_masuk', $data['id_sk_barang_masuk']);
        return $this->db->delete('tb_sk_barang_masuk');
    }


    public function get_laporan_barang_masuk($tgl_msk = null, $tgl_keluar = null)
{
    $this->db->select('b.tgl_msk, m.nama_barang, b.jumlah_masuk');
    $this->db->from('tb_sk_barang_masuk b'); // Tabel barang masuk
    $this->db->join('tb_sk_masterbarang m', 'b.id_sk_barang = m.id_sk_barang', 'left'); // Join berdasarkan ID Barang

    if ($tgl_msk && $tgl_keluar) {
        $this->db->where('b.tgl_msk >=', $tgl_msk);
        $this->db->where('b.tgl_msk <=', $tgl_keluar);
    }
    return $this->db->get()->result();
}

}
