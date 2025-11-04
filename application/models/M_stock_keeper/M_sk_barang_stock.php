<?php
class M_sk_barang_stock extends CI_Model {

    public function get($id = null)
    {
        $sql = "
        SELECT 
            a.id_sk_barang,
            a.nama_barang,
            a.spek,
            a.unit,
            a.created_at,
            a.created_by,
            a.updated_at,
            a.updated_by,
            a.is_deleted,
            COALESCE(masuk.total_masuk, 0) AS jumlah_masuk,
            COALESCE(keluar.total_keluar, 0) AS jumlah_keluar,
            (COALESCE(masuk.total_masuk, 0) - COALESCE(keluar.total_keluar, 0)) AS stock
        FROM tb_sk_masterbarang a
        LEFT JOIN (
            SELECT id_sk_barang, SUM(jumlah_masuk) AS total_masuk
            FROM tb_sk_barang_masuk
            GROUP BY id_sk_barang
        ) masuk ON a.id_sk_barang = masuk.id_sk_barang
        LEFT JOIN (
            SELECT id_sk_barang, SUM(jumlah_keluar) AS total_keluar
            FROM tb_sk_barang_keluar
            GROUP BY id_sk_barang
        ) keluar ON a.id_sk_barang = keluar.id_sk_barang
        WHERE a.is_deleted = 0
        ORDER BY a.id_sk_barang ASC";
    
        return $this->db->query($sql);
    }
    


    // public function get($id = null)
    // {
    //     $sql = "
    //     SELECT a.*, b.jumlah_masuk, c.jumlah_keluar 
    //     FROM tb_sk_masterbarang a
    //     LEFT JOIN tb_sk_barang_masuk b ON a.id_sk_barang = b.id_sk_barang
    //     LEFT JOIN tb_sk_barang_keluar c ON a.id_sk_barang = c.id_sk_barang
    //     WHERE a.is_deleted = 0 ORDER BY a.id_sk_barang ASC";

    //     return $this->db->query($sql);
    // }

    public function get_stock()
    {
        $this->db->select('id_barang, nama, qty, masuk, keluar, (masuk - keluar) AS stock');
        $this->db->from('tb_sk_barang_stock');
        return $this->db->get();

        // $this->db->select('id_barang, nama, qty, masuk, keluar, stock');
        // $this->db->from('tb_sk_barang_stock');
        // return $this->db->get();
    }
}