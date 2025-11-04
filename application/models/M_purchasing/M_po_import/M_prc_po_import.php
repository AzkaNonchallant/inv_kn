<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_prc_po_import extends CI_Model
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
        SELECT a.*, b.id_prc_po_import, b.jumlah, b.harga_perunit, b.total_harga, c.id_prc_master_barang, c.nama_barang, c.satuan, d.id_prc_ppb_supplier, d.nama_po_supplier, d.pic_po_supplier
        FROM tb_prc_po_import_tf a
        LEFT JOIN tb_prc_po_import b ON a.no_po_import = b.no_po_import
        LEFT JOIN tb_prc_master_barang c ON b.id_prc_master_barang = c.id_prc_master_barang
        LEFT JOIN tb_prc_ppb_supplier d ON c.id_prc_ppb_supplier = d.id_prc_ppb_supplier
        WHERE a.is_deleted = 0 ORDER BY a.id_prc_po_import_tf ASC";

        return $this->db->query($sql);
    }

    public function add_po_import($data)
    {
        $id_user = $this->id_user();
        $sql = "
        INSERT INTO tb_prc_po_import (no_po_import, id_prc_master_barang, jumlah, harga_perunit, total_harga, created_at, created_by, updated_at, updated_by, is_deleted) 
        VALUES ( '$data[no_po_import]', '$data[id_prc_master_barang]','$data[jumlah]','$data[harga_perunit]', '$data[total_harga]', NOW(), '$id_user', '0000-00-00 00:00:00', '', '0')";

        return $this->db->query($sql);
    }
    public function add_import_transfer($data)
    {
        $id_user = $this->id_user();
        $sql = "
        INSERT INTO tb_prc_po_import_tf ( id_prc_po_import_tf, prc_admin, no_po_import, tgl_po_import, metode, shipment, pic1, pic2, created_at, created_by, updated_at, updated_by, is_deleted) 
        VALUES ( '$data[id_prc_po_import_tf]', '$data[prc_admin]', '$data[no_po_import]', '$data[tgl_po_import]','$data[metode]','$data[shipment]','$data[pic1]','$data[pic2]', NOW(), '$id_user', '0000-00-00 00:00:00', '', '0')";

        return $this->db->query($sql);
    }

    public function update($data)
    {
        $id_user = $this->id_user();
        $sql = "
        UPDATE tb_prc_po_import 
        SET 
            
            prc_admin = '$data[prc_admin]',
            no_po_import = '$data[no_po_import]',
            tgl_po_import = '$data[tgl_po_import]',
            id_prc_ppb_supplier = '$data[id_prc_ppb_supplier]',
            id_prc_master_barang = '$data[id_prc_master_barang]',
            jumlah = '$data[jumlah]',
            harga_perunit = '$data[harga_perunit]',
            total_harga = '$data[total_harga]',
            metode = '$data[metode]',
            shipment = '$data[shipment]',
            pic1 = '$data[pic1]',
            pic2 = '$data[pic2]',
            updated_at = NOW(),   
            updated_by = '$id_user' 
        WHERE id_prc_po_import = '$data[id_prc_po_import]'
        ";

        

        // Logging query untuk debugging
        log_message('debug', 'Query update: ' . $this->db->last_query());
        
        return $this->db->query($sql);
    }

    public function delete($data)
    {
        $id_user = $this->id_user();

        $sql1 = "
        DELETE FROM `tb_prc_po_import_tf` 
        WHERE `no_po_import`='$data[no_po_import]'
    ";
    $sql = "
       DELETE FROM `tb_prc_po_import`
        WHERE `no_po_import`='$data[no_po_import]'
    ";
    $this->db->query($sql);
    return $this->db->query($sql1);
    }

    public function cek_no_po_import($no_po_import)
    {
        $sql = "
            SELECT COUNT(a.no_po_import) count_sj FROM tb_prc_po_import a
            WHERE a.no_po_import = '$no_po_import' AND a.is_deleted = 0";
        return $this->db->query($sql);
    }

    public function det_ppb_barang($no_po_import)
    {
        $sql = "
            SELECT a.*, b.nama_barang, c.nama_po_supplier, c.pic_po_supplier
            FROM tb_prc_po_import a
            LEFT JOIN tb_prc_master_barang b ON a.id_prc_master_barang = b.id_prc_master_barang
            LEFT JOIN tb_prc_ppb_supplier c ON b.id_prc_ppb_supplier = c.id_prc_ppb_supplier

            WHERE a.no_po_import = '$no_po_import' ORDER BY a.id_prc_po_import ASC";
        return $this->db->query($sql);
    }
}