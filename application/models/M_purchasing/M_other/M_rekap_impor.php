<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_rekap_impor extends CI_Model
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
        SELECT a.*,b.kode_barang,b.nama_barang,c.kode_supplier,c.nama_supplier FROM tb_rekap_import a
            LEFT JOIN tb_barang b ON a.id_barang = b.id_barang
            LEFT JOIN tb_supplier c ON a.id_supplier = c.id_supplier
            WHERE a.is_deleted = 0 ORDER BY a.created_at ASC
        ";
        return $this->db->query($sql);
    }
    public function add($data){
        $id_user = $this->id_user();
        $sql = "
        INSERT INTO `tb_rekap_import` (`id_barang`,`id_supplier`,`no_order`, `tgl_pib`, `no_pib`, `spesifikasi`, `jumlah`, `harga_per_unit`, `tot_value`, `no_invoice`, `tgl_invoice`, `metode_payment`, `etd`, `eta`, `no_bl`, `voyager`, `no_voyager`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`)
        VALUES ('$data[id_barang]', '$data[id_supplier]', '$data[no_order]', '$data[tgl_pib]','$data[no_pib]', '$data[spesifikasi]', '$data[jumlah]', '$data[harga_per_unit]', '$data[tot_value]', '$data[no_invoice]', '$data[tgl_invoice]', '$data[metode_payment]', '$data[etd]', '$data[eta]', '$data[no_bl]', '$data[voyager]', '$data[no_voyager]', NOW(),'$id_user','0000-00-00 00:00:00','','0')
        ";
        return $this->db->query($sql);
    }
    public function delete($data)
    {
        $id_user = $this->id_user();

        $sql = "
        DELETE FROM `tb_rekap_import`
         WHERE `id_rekap_import`='$data[id_rekap_import]'
        ";
        return $this->db->query($sql);
    }
}