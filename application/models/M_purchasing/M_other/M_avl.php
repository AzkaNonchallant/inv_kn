<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_avl extends CI_Model
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
        SELECT a.*,b.kode_supplier,b.nama_supplier,b.golongan,b.negara,b.contact_person,b.telepon,b.fax,b.mutu_barang,b.kesesuaian_sistem_mutu,b.waktu_pelaksanaan_pengiriman,b.harga,b.tanggapan_atas_permintaan_keluhan,b.pelayanan_purna_jual,b.peringkat,b.alamat FROM tb_avl a
            LEFT JOIN tb_supplier b ON a.id_supplier = b.id_supplier
            WHERE a.is_deleted = 0 ORDER BY a.created_at ASC";
        return $this->db->query($sql);
    }
    public function add($data){
        $id_user = $this->id_user();
        $sql="
        INSERT INTO `tb_avl`(`periode`,`berlaku`,`id_supplier`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`)
        VALUES ('$data[periode]','$data[berlaku]','$data[id_supplier]', NOW(),'$id_user','0000-00-00 00:00:00','','0')
        ";
        return $this->db->query($sql);
    }

    public function delete($data)
    {
        $id_user = $this->id_user();
        $sql = "
        DELETE FROM `tb_avl`
        WHERE `id_avl`='$data[id_avl]'
        ";
        return $this->db->query($sql);
    }

    public function ambil_avl($kode_supplier)
    {
        $sql = "
        SELECT a.*,b.kode_supplier,b.nama_supplier,b.golongan,b.negara,b.contact_person,b.telepon,b.fax,b.mutu_barang,b.kesesuaian_sistem_mutu,b.waktu_pelaksanaan_pengiriman,b.harga,b.tanggapan_atas_permintaan_keluhan,b.pelayanan_purna_jual,b.peringkat,b.alamat FROM tb_supplier a
            LEFT JOIN tb_supplier b ON a.id_supplier = b.id_supplier
            WHERE a.is_deleted = 0 AND b.kode_supplier = '$kode_supplier' ORDER BY a.kode_supplier ASC";
        return $this->db->query($sql);
    }
}