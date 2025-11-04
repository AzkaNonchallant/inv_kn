<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_prc_po_supplier extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    function id_user(){
        return $this->session->userdata("id_user");
    }
    public function get($id = null){
        // $kode_user = $this->kode_user();
        $sql = "SELECT * FROM tb_prc_ppb_supplier WHERE is_deleted = 0 ORDER BY created_at ASC";

        return $this->db->query($sql);
    }

    public function add($data)
    {
        $id_user = $this->id_user();
        $sql = "
        INSERT INTO `tb_prc_ppb_supplier`(`golongan`, `kode_prc_po_supplier`, `nama_po_supplier`, `pic_po_supplier`, `negara_po_supplier`,`alamat_po_supplier`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) 
        VALUES ('$data[golongan]', '$data[kode_prc_po_supplier]', '$data[nama_po_supplier]', '$data[pic_po_supplier]','$data[negara_po_supplier]','$data[alamat_po_supplier]',NOW(),'$id_user','0000-00-00 00:00:00','','0')
        ";

        return $this->db->query($sql);
    }
    public function update($data)
    {
        $id_user = $this->id_user();
        $sql = "
            UPDATE `tb_prc_ppb_supplier` 
            SET `kode_prc_po_supplier`='$data[kode_prc_po_supplier]', `golongan`='$data[golongan]', `nama_po_supplier`='$data[nama_po_supplier]',`pic_po_supplier`='$data[pic_po_supplier]',`nomor_po_supplier`='$data[nomor_po_supplier]',`negara_po_supplier`='$data[negara_po_supplier]',`alamat_po_supplier`='$data[alamat_po_supplier]', `updated_at`=NOW(),`updated_by`='$id_user' 
            WHERE `id_prc_ppb_supplier`='$data[id_prc_ppb_supplier]'
        ";
        return $this->db->query($sql);
        // return $sql;
    }


    public function delete($data)
    {
        $id_user = $this->id_user();
        $sql = "
        DELETE FROM `tb_prc_ppb_supplier`
        WHERE `id_prc_ppb_supplier`='$data[id_prc_ppb_supplier]'
        ";
        return $this->db->query($sql);
    }

    public function cek_kode_supplier($kode_prc_po_supplier)
    {
        $sql = "
            SELECT COUNT(a.kode_prc_po_supplier) count_sj FROM tb_prc_ppb_supplier a
            WHERE a.kode_prc_po_supplier = '$kode_prc_po_supplier' AND a.is_deleted = 0";
        return $this->db->query($sql);
    }
}
