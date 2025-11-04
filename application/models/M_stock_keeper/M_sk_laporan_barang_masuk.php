<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_sk_laporan_barang_masuk extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function nama_operator()
    {
        return $this->session->userdata("nama_operator");
    }

    public function get($tgl = null, $tgl2 = null, $name = null)
    {
        $where = array();

        if ($tgl != null && $tgl2 != null) {
            $tgl = explode("/", $tgl);
            if (count($tgl) == 3) {
                $tgl = "$tgl[2]-$tgl[1]-$tgl[0]";
            } else {
                $tgl = null;  // Set to null if date is invalid
            }
            $tgl2 = explode("/", $tgl2);
            if (count($tgl2) == 3) {
                $tgl2 = "$tgl2[2]-$tgl2[1]-$tgl2[0]";
            } else {
                $tgl2 = null;  // Set to null if date is invalid
            }

            if ($tgl != null && $tgl2 != null) {
                $where[] = "AND a.tgl_msk >= '$tgl' AND a.tgl_msk <= '$tgl2'";
            }
        }

        if ($name) {
            $where[] = "AND b.nama_barang = '$name'";
        }

        $where = implode(" ", $where);

        $sql = "
            SELECT 
                a.*, b.nama_barang, b.spek, b.unit
            FROM tb_sk_barang_masuk a
            LEFT JOIN tb_sk_masterbarang b ON a.id_sk_barang = b.id_sk_barang
            WHERE a.is_deleted = 0 $where 
            ORDER BY a.tgl_msk ASC";
        $query = $this->db->query($sql);

        if ($query) {
            return $query->result_array();
        } else {
            return array();
        }
    }

    public function get_master_barang()
    {
        $sql = "SELECT * FROM tb_sk_masterbarang WHERE is_deleted = 0 ORDER BY nama_barang ASC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_filter_brng()
    {
        $sql = "
            SELECT DISTINCT b.nama_barang 
            FROM tb_sk_barang_masuk a
            LEFT JOIN tb_sk_masterbarang b ON a.id_sk_barang = b.id_sk_barang
            WHERE a.is_deleted = 0 
            ORDER BY b.nama_barang ASC";

        return $this->db->query($sql)->result_array();
    }

    public function jml_barang_masuk($data)
    {
        $sql = "
            SELECT SUM(jumlah_masuk) AS tot_barang_masuk 
            FROM tb_sk_barang_masuk
            WHERE id_sk_barang = '$data[id_sk_barang]' AND is_deleted = 0";

        return $this->db->query($sql)->row()->tot_barang_masuk;
    }

    function multisave($id_sk_barang_masuk, $category)
    {
        $query = "INSERT INTO tb_sk_barang_masuk (id_sk_barang_masuk, category) VALUES ('$id_sk_barang_masuk', '$category')";
        $this->db->query($query);
    }
}