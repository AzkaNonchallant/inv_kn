<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_po extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function id_user()
    {
        return $this->session->userdata("id_user");
    }
    public function get($id = null){
        $sql = "
        SELECT a.*,b.kode_barang,b.nama_barang,c.kode_supplier,c.nama_supplier FROM tb_po a
            LEFT JOIN tb_barang b ON a.id_barang = b.id_barang
            LEFT JOIN tb_supplier c ON a.id_supplier = c.id_supplier
            WHERE a.is_deleted = 0 ORDER BY a.created_at ASC
        ";
        return $this->db->query($sql);
    }
}